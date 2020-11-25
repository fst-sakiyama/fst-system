<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TakeoverTheOperation;
use App\Models\ShiftTable;
use App\Models\MasterShift;
use App\Models\ViewShiftWorkLoad;
use App\Models\ViewWorkTable1;
use App\Models\ViewWorkTable2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year,$month)
    {
        // $tableName = 'view_work_table2';
        // $columns = Schema::connection('mysql_two')->getColumnListing($tableName);
        //
        // $columnTypes = [];
        // foreach ($columns as $column) {
        //     // カラムタイプを取得
        //     $columnTypes[$column] = Schema::connection('mysql_two')->getConnection()->getDoctrineColumn($tableName, $column)->toArray()['type'];
        //     dump($columnTypes[$column]);
        // }
        //予定
        $res = ViewWorkTable1::whereNull('lateEarlyLeave')
                ->has('viewShiftWorkLoad')
                ->get();
        dd($res);

        $res1 = DB::connection('mysql_two')->table('view_work_table1');
        $res = DB::connection('mysql_two')->table('view_work_table2')->unionAll($res1)->get();
        dd($res);
        $res = ShiftTable::has('workTable')
                ->join('work_tables AS t1','shift_tables.shiftTableId','=','t1.shiftTableId')
                ->select('shift_tables.*','t1.startHour','t1.startMinute','t1.endHour','t1.endMinute','t1.rest1StartHour','t1.rest1StartMinute','t1.rest1EndHour','t1.rest1EndMinute','t1.rest2StartHour','t1.rest2StartMinute','t1.rest2EndHour','t1.rest2EndMinute','t1.rest3StartHour','t1.rest3StartMinute','t1.rest3EndHour','t1.rest3EndMinute','t1.lateEarlyLeave','t1.specialReason','t1.remarks');
        $sql = ShiftTable::doesntHave('workTable')
                ->join('master_shifts AS t2','shift_tables.shiftId','=','t2.shiftId')
                ->select('shift_tables.*','t2.startHour','t2.startMinute','t2.endHour','t2.endMinute','t2.rest1StartHour','t2.rest1StartMinute','t2.rest1EndHour','t2.rest1EndMinute','t2.rest2StartHour','t2.rest2StartMinute','t2.rest2EndHour','t2.rest2EndMinute','t2.rest3StartHour','t2.rest3StartMinute','t2.rest3EndHour','t2.rest3EndMinute',DB::raw('null AS `lateEarlyLeave`'),DB::raw('null AS `specialReason`'),DB::raw('null AS `remarks`'))
                ->UnionAll($res)->toSql();
        dd($sql);
        $tests = ViewWorkTable::whereBetween('workDay',['2020-10-01','2020-10-02'])->get();
        foreach($tests as $test){
          dump($test->workLoads);
        }
        dd($tests);
      // $tests = ViewShiftWorkLoad::all();
      // foreach($tests as $test)
      // {
      //   // dump($test->workLoad);
      // }
      // dd($test);
      // $shiftWorkLoad = MasterShift::selectRaw('shiftId,
      //                   ifnull(endHour,0)*60+ifnull(endMinute,0)
      //                   -ifnull(startHour,0)*60+ifnull(startMinute,0)
      //                   -(ifnull(rest1EndHour,0)*60+ifnull(rest1EndMinute,0)
      //                     -ifnull(rest1StartHour,0)*60+ifnull(rest1StartMinute,0))
      //                   -(ifnull(rest2EndHour,0)*60+ifnull(rest2EndMinute,0)
      //                     -ifnull(rest2StartHour,0)*60+ifnull(rest2StartMinute,0))
      //                   -(ifnull(rest3EndHour,0)*60+ifnull(rest3EndMinute,0)
      //                     -ifnull(rest3StartHour,0)*60+ifnull(rest3StartMinute,0)) AS workLoad')
      //                   ->get();
      // dd($shiftWorkLoad);
      // $res1 = ShiftTable::has('workTable')
      //         ->join('work_tables AS t','shift_tables.shiftTableId','=','t.shiftTableId')
      //         ->select('shift_tables.*','t.startHour','t.startMinute','t.endHour','t.endMinute','t.rest1StartHour','t.rest1StartMinute','t.rest1EndHour','t.rest1EndMinute','t.rest2StartHour','t.rest2StartMinute','t.rest2EndHour','t.rest2EndMinute','t.rest3StartHour','t.rest3StartMinute','t.rest3EndHour','t.rest3EndMinute','t.lateEarlyLeave','t.specialReason','remarks');
      // $res2 = ShiftTable::doesntHave('workTable')
      //         ->join('master_shifts AS t','shift_tables.shiftId','=','t.shiftId')
      //         ->select('shift_tables.*','t.startHour','t.startMinute','t.endHour','t.endMinute','t.rest1StartHour','t.rest1StartMinute','t.rest1EndHour','t.rest1EndMinute','t.rest2StartHour','t.rest2StartMinute','t.rest2EndHour','t.rest2EndMinute','t.rest3StartHour','t.rest3StartMinute','t.rest3EndHour','t.rest3EndMinute',DB::raw('null AS lateEarlyLeave'),DB::raw('null AS specialReason'),DB::raw('null AS remarks'))
      //         ->union($res1);
      // $result = $res2->whereDate('workDay','2020-10-02');

      // foreach($result->get() as $re){
      //   dump($re->startHour);
      // }
      // dd($result->get());
      // 年月の指定がないときは、現在の年月でカレンダーを作成する
      if(empty($year) || empty($month)){
        $year = date("Y");
        $month = date("m");
      }

      $disp = new Carbon("{$year}-{$month}-01");
      // $dates = $this->getCalendarDates($request->year,$request->month);
      $calendar = new Calendar;
      $dates = $calendar->getCalendarDates($year,$month);

      $setting = new HolidaySetting;
      $setting->loadHoliday($year);

      $cnt = [];
      $holidays = [];

      foreach ($dates as $date) {
        $cnt += array($date->timestamp=>TakeoverTheOperation::withTrashed()->whereDate('created_at','=',$date)->count());

        if($setting->isHoliday($date)){
          $holidays += array($date->timestamp=>"day-holiday");
        } else {
          $holidays += array($date->timestamp=>'');
        }
      }
      return view('dummy.index',compact('disp','dates','cnt','calendar','holidays'));
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
        //
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
        //
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
