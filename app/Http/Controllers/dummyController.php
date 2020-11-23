<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TakeoverTheOperation;
use App\Models\ShiftTable;
use App\Models\MasterShift;
use App\Models\ViewShiftWorkLoad;
use App\Models\ViewWorkTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Illuminate\Support\Facades\DB;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year,$month)
    {
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
