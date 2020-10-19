<?php

namespace App\Http\Controllers;

use App\Models\ShiftTable;
use App\Models\WorkTable;
use App\Models\MasterShift;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Illuminate\Support\Facades\Auth;

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

        if(empty($request->uid)){
          $userId = Auth::id();
        } else {
          $userId = $request->uid;
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

        $workTables = DB::connection('mysql_two')->table('shift_tables')
                      ->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                      ->leftJoin('work_tables',function($join){
                          $join->on('shift_tables.workDay','=','work_tables.workTableWorkDay');
                          $join->on('shift_tables.userId','=','work_tables.workTableUserId');
                      })->whereBetween('shift_tables.workDay',[$firstDay,$lastDay])
                        ->where('shift_tables.userId',$userId)
                        ->get();

        $items = [];
        $status = '';

        if(empty($workTables[0])){
          $status = "シフト表が作成されておりません。\n管理者にご確認ください。";
          return view('work_table.index',compact('status','dates','items','holidays','calendar','firstDay'));
        }

        foreach($workTables as $workTable)
        {
          $items += array(Carbon::create($workTable->workDay)->timestamp=>$workTable);
        }
         // dd($items);

        return view('work_table.index',compact('status','dates','items','holidays','calendar','firstDay'));
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

        if(is_null($request->workTableRest1StartHour) || is_null($request->workTableRest1StartMinute) || is_null($request->workTableRest1EndHour) || is_null($request->workTableRest1EndMinute)){
          $request->workTableRest1StartHour = null;
          $request->workTableRest1StartMinute = null;
          $request->workTableRest1EndHour= null;
          $request->workTableRest1EndMinute = null;
        }

        if(is_null($request->workTableRest2StartHour) || is_null($request->workTableRest2StartMinute) || is_null($request->workTableRest2EndHour) || is_null($request->workTableRest2EndMinute)){
          $request->workTableRest2StartHour = null;
          $request->workTableRest2StartMinute = null;
          $request->workTableRest2EndHour= null;
          $request->workTableRest2EndMinute = null;
        }

        if(is_null($request->workTableRest3StartHour) || is_null($request->workTableRest3StartMinute) || is_null($request->workTableRest3EndHour) || is_null($request->workTableRest3EndMinute)){
          $request->workTableRest3StartHour = null;
          $request->workTableRest3StartMinute = null;
          $request->workTableRest3EndHour= null;
          $request->workTableRest3EndMinute = null;
        }

        // dd($request);

        DB::beginTransaction();

        try{
          WorkTable::updateOrcreate(
            [
              'workTableWorkDay' => $request->workDay,
              'workTableUserId' => $request->userId
            ],
            [
              'workTableWorkDay' => $request->workDay,
              'workTableUserId' => $request->userId,
              'goingWorkHour' => $request->goingWorkHour,
              'goingWorkMinute' => $request->goingWorkMinute,
              'leavingWorkHour' => $request->leavingWorkHour,
              'leavingWorkMinute' => $request->leavingWorkMinute,
              'workTableRest1StartHour' => $request->workTableRest1StartHour,
              'workTableRest1StartMinute' => $request->workTableRest1StartMinute,
              'workTableRest1EndHour' => $request->workTableRest1EndHour,
              'workTableRest1EndMinute' => $request->workTableRest1EndMinute,
              'workTableRest2StartHour' => $request->workTableRest2StartHour,
              'workTableRest2StartMinute' => $request->workTableRest2StartMinute,
              'workTableRest2EndHour' => $request->workTableRest2EndHour,
              'workTableRest2EndMinute' => $request->workTableRest2EndMinute,
              'workTableRest3StartHour' => $request->workTableRest3StartHour,
              'workTableRest3StartMinute' => $request->workTableRest3StartMinute,
              'workTableRest3EndHour' => $request->workTableRest3EndHour,
              'workTableRest3EndMinute' => $request->workTableRest3EndMinute,
              'lateEarlyLeave' => $request->lateEarlyLeave,
              'specialReason' => $request->specialReason,
              'remarks' => $request->remarks
            ]
          );

          $item = ShiftTable::whereDate('workDay','=',$request->workDay)
                    ->where('userId','=',$request->userId)->first();
          $item->shiftId = $request->shiftId;
          $item->save();

          DB::commit();

        }catch(\Exception $e) {

          DB::rollback();
          dd('エラーが発生しました work_table.stor');

        }

        return redirect()->route('work_table.index');
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
      $editDate = Carbon::createFromTimestamp($request->d)->format('Y-m-d');
      $userId = Auth::id();

      // テスト用
      $userId = 1;

      $workTable = DB::connection('mysql_two')->table('shift_tables')
                    ->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                    ->leftJoin('work_tables',function($join){
                        $join->on('shift_tables.workDay','=','work_tables.workTableWorkDay');
                        $join->on('shift_tables.userId','=','work_tables.workTableUserId');
                    })->whereDate('shift_tables.workDay',$editDate)
                      ->where('shift_tables.userId',$userId)
                      ->first();

        $masterShifts = MasterShift::all();
        $masterShift = MasterShift::select('shiftId','shiftName')->get()->pluck('shiftName','shiftId');

        return view('work_table.edit',compact('masterShifts','masterShift','workTable'));
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
}
