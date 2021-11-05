<?php

/**
 *  勤務表を管理する
 *
 *
 */

namespace App\Http\Controllers;

use App\User;
use App\Models\ShiftTable;
use App\Models\WorkTable;
use App\Models\WorkLoad;
use App\Models\MasterShift;
use App\Models\MasterProject;
use App\Models\TeamProject;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Exports\Export;
use App\Http\Requests\UserFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ViewExport;
use App\Exports\ViewExportMultiple;

class WorkTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        // 年月の指定がないとき
        if(empty($year) || empty($month)){
          $year = date("Y");
          $month = date("m");
        }

        if(Gate::allows('admin-higher')){
          if(empty($request->uid)){
            $userId = Auth::id();
          } else {
            $userId = $request->uid;
          }
        } else {
          $userId = Auth::id();
        }

        // テスト用年月
        // $year = 2020;
        // $month = 10;
        // $userId = 1;

        $calendar = new Calendar;
        $dates = $calendar->getCalendarDates($year,$month);
        // $dates = $calendar->getCalendarDates($year,9);

        $setting = new HolidaySetting;
        $setting->loadHoliday($year);

        $holidays = [];

        foreach ($dates as $date) {
          if($setting->isHoliday($date)){
            $holidays += array($date->timestamp=>$setting->jpHolidays[$date->timestamp]);
          } else {
            $holidays += array($date->timestamp=>'');
          }
        }

        // 月初、月末
        $firstDay = Carbon::create($year,$month,1)->firstOfMonth();
        $lastDay = Carbon::create($year,$month,1)->lastOfMonth();

        $workTables = ShiftTable::where(function($query) use($userId,$firstDay,$lastDay){
                        $query->where('userId',$userId)
                              ->whereBetween('workDay',[$firstDay,$lastDay]);
                        })->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                          ->get();

        $items = [];
        $status = '';
        $nonOpe = '';

        if(empty($workTables[0])){
          $status = "シフト表が作成されていないため、勤務表は存在しません。\n管理者にご確認ください。";
          return view('work_table.index',compact('userId','status','dates','items','holidays','calendar','firstDay','nonOpe'));
        }

        foreach($workTables as $workTable)
        {
          $dt = new Carbon($workTable->workDay);
          $items += array($dt->timestamp=>$workTable);
        }

        // 無稼働時間のプロジェクトIDを取得する
        $item = MasterProject::where('projectName','無稼働時間')->first()->projectId;
        // ユーザの所属チームを取得する
        $team = User::find($userId)->own_department;
        // 無稼働時間のチームプロジェクトIDを取得する
        $nonOpe = TeamProject::where('projectId',$item)->where('workingTeamId',$team)->first()->teamProjectId;

        return view('work_table.index',compact('userId','status','dates','items','holidays','calendar','firstDay','nonOpe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
          // シフト表テーブルにシフトIDを登録
          $item = ShiftTable::find($request->shiftTableId);
          $item->shiftId = $request->shiftId;
          $item->save();

          // 実労働テーブルに実労働時間を記録
          WorkTable::updateOrcreate(
            [
              'shiftTableId' => $request->shiftTableId,
            ],
            [
              'startHour' => $request->startHour,
              'startMinute' => $request->startMinute,
              'endHour' => $request->endHour,
              'endMinute' => $request->endMinute,
              'rest1StartHour' => $request->rest1StartHour,
              'rest1StartMinute' => $request->rest1StartMinute,
              'rest1EndHour' => $request->rest1EndHour,
              'rest1EndMinute' => $request->rest1EndMinute,
              'rest2StartHour' => $request->rest2StartHour,
              'rest2StartMinute' => $request->rest2StartMinute,
              'rest2EndHour' => $request->rest2EndHour,
              'rest2EndMinute' => $request->rest2EndMinute,
              'rest3StartHour' => $request->rest3StartHour,
              'rest3StartMinute' => $request->rest3StartMinute,
              'rest3EndHour' => $request->rest3EndHour,
              'rest3EndMinute' => $request->rest3EndMinute,
              'lateEarlyLeave' => $request->lateEarlyLeave,
              'specialReason' => $request->specialReason,
              'remarks' => $request->remarks,
            ]
          );

          // 工数表から現在登録済みのデータがあれば削除しておく
          WorkLoad::where('shiftTableId','=',$request->shiftTableId)->delete();

          // 無稼働時間があれば登録
          if($request->subCalcWorkMin>0){
            $item = new WorkLoad();
            $item->shiftTableId = $request->shiftTableId;
            $item->teamProjectId = $request->nonOpe;
            $item->workLoad = $request->subCalcWorkMin;
            $item->save();
          }

          // 工数を登録
          $items = $request->teamProjectId;
          foreach($items[0] as $key => $value0){
            $value1 = $items[1][$key];
            if($value0 || $value1){
              $item = new WorkLoad();
              $item->shiftTableId = $request->shiftTableId;
              $item->teamProjectId = $key;
              $item->workLoad = $value0;
              $item->memo = $value1;
              $item->save();
            }
          }

          DB::commit();

        }catch(\Exception $e) {

          DB::rollback();
          dd('エラーが発生しました work_table.stor');

        }

        return redirect()->route('work_table.index',['uid'=>$request->userId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function doEdit(Request $request)
    {
        $editDate = Carbon::createFromTimestamp($request->d);
        $subEditDate = $editDate->copy();
        $userId = $request->uid;
        $shiftTableId = $request->sid;

        // 無稼働時間のプロジェクトIDを取得する
        $item = MasterProject::where('projectName','=','無稼働時間')->first()->projectId;
        // ユーザの所属チームを取得する
        $team = User::find($userId)->own_department;
        // 無稼働時間のチームプロジェクトIDを取得する
        $nonOpe = TeamProject::where('projectId','=',$item)->where('workingTeamId','=',$team)->first()->teamProjectId;

        // for($i=0;$i<5;$i++){
        //   dump($subEditDate->subDay());
        // }
        // dd($editDate->format('Y-m-d'));
        // テスト用
        // $userId = 1;

        // $test = TeamProject::where('workingTeamId',3)->select('teamProjectId','projectId')->get()->toArray();
        // $res = array_search(100,array_column($test,'teamProjectId'));
        // dd($res);

        $workTable = ShiftTable::where(function($query) use($editDate,$userId){
                            $query->whereDate('workDay',$editDate)
                                  ->where('userId',$userId);
                          })->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                            ->first();

        $masterShifts = MasterShift::all();
        $masterShift = MasterShift::select('shiftId','shiftName')->get()->pluck('shiftName','shiftId');

        $teamId = User::find($userId)->own_department;
        $teamProjects = TeamProject::where('workingTeamId',$teamId)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->orderBy('master_projects.clientId')->get();

        $workLoads = array();
        $tempWorkLoads = WorkLoad::where('shiftTableId',$shiftTableId)->get();
        foreach($tempWorkLoads as $temp){
          $id = $temp->teamProjectId;
          $workLoads[$id][0] = $temp->workLoad;
          $workLoads[$id][1] = $temp->memo;
        }

        $before=array();
        for($i=0;$i<5;$i++){
          $sid = ShiftTable::where(function($query) use($subEditDate,$userId){
                              $query->whereDate('workDay',$subEditDate->subDay()->format('Y-m-d'))
                                    ->where('userId',$userId);
                            })->first();
          if($sid){ // 勤務表が作成されていない
            $sid = $sid->shiftTableId;
            $temp = WorkLoad::where('shiftTableId',$sid)->whereNotNull('workLoad');
            if($temp->count()){
              $results = $temp->get();
              foreach($results as $result){
                $id = $result->teamProjectId;
                $before[$id] = $result->workLoad;
              }
              $before[0] = $result->shiftTable->workDay;
              break;
            }
          }else{
            break;
          }
        }

        return view('work_table.edit',compact('nonOpe','userId','shiftTableId','masterShifts','masterShift','workTable','teamProjects','workLoads','before'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export(Request $request)
    {
      $year = $request->year;
      $month = $request->month;
      // 年月の指定がないとき
      if(empty($year) || empty($month)){
        $year = date("Y");
        $month = date("m");
      }

      if(Gate::allows('admin-higher')){
        if(empty($request->uid)){
          $userId = Auth::id();
        } else {
          $userId = $request->uid;
        }
      } else {
        $userId = Auth::id();
      }

      // テスト用年月
      // $year = 2020;
      // $month = 10;
      // $userId = 2;


      $calendar = new Calendar;
      $dates = $calendar->getCalendarDates($year,$month);
      // $dates = $calendar->getCalendarDates($year,9);

      $setting = new HolidaySetting;
      $setting->loadHoliday($year);

      $holidays = [];

      foreach ($dates as $date) {
        if($setting->isHoliday($date)){
          $holidays += array($date->timestamp=>$setting->jpHolidays[$date->timestamp]);
        } else {
          $holidays += array($date->timestamp=>'');
        }
      }

      // 月初、月末
      $firstDay = Carbon::create($year,$month,1)->firstOfMonth();
      $lastDay = Carbon::create($year,$month,1)->lastOfMonth();

      $workTables = ShiftTable::where(function($query) use($userId,$firstDay,$lastDay){
                      $query->where('userId',$userId)
                            ->whereBetween('workDay',[$firstDay,$lastDay]);
                      })->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                        ->get();

      $items = [];
      $status = '';

      if(empty($workTables[0])){
        $status = "シフト表が作成されておりません。\n管理者にご確認ください。";
        return view('work_table.index',compact('userId','status','dates','items','holidays','calendar','firstDay'));
      }

      foreach($workTables as $workTable)
      {
        $dt = new Carbon($workTable->workDay);
        $items += array($dt->timestamp=>$workTable);
      }

      $view = view('work_table.export',compact('userId','status','dates','items','holidays','calendar','firstDay'));

      $userName = User::find($userId)->name;
      $bookName = $year.'年'.$month.'月分【'.$userName.'】勤務表.xlsx';

      return Excel::download(new ViewExport($view),$bookName);
    }

    public function allExport(Request $request)
    {
      $bookName = $request->year.'年'.$request->month.'月分勤務表.xlsx';
      return Excel::download(new ViewExportMultiple($request->year,$request->month), $bookName);
    }

}
