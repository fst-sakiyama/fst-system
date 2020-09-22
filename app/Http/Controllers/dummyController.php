<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TakeoverTheOperation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year,$month)
    {
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
