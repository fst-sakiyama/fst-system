<?php

namespace App\Http\Controllers;

use App\Models\ShiftTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;

class ShiftTableController extends Controller
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

      $calendar = new Calendar;
      // $dates = $calendar->getCalendarDates($year,$month);
      $dates = $calendar->getCalendarDates($year,9);

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
      // $firstDay = Carbon::create($year,$month,1)->firstOfMonth()->format('Y-m-d');
      // $lastDay = Carbon::create($year,$month,1)->lastOfMonth()->format('Y-m-d');
      // テスト用
      $firstDay = Carbon::create($year,$month-1,1);
      $lastDay = Carbon::create($year,$month-1,30);

      $param = [
        'firstDay' => $firstDay->format('Y-m-d'),
        'lastDay' => $lastDay->format('Y-m-d')
      ];

      $items = DB::connection('mysql_two')->
                select('SELECT t5.userId,t5.name,
                        MAX(CASE WHEN Day(t5.workDay) = 1 THEN t5.shiftName ELSE null END) AS d1,
                        MAX(CASE WHEN Day(t5.workDay) = 2 THEN t5.shiftName ELSE null END) AS d2,
                        MAX(CASE WHEN Day(t5.workDay) = 3 THEN t5.shiftName ELSE null END) AS d3,
                        MAX(CASE WHEN Day(t5.workDay) = 4 THEN t5.shiftName ELSE null END) AS d4,
                        MAX(CASE WHEN Day(t5.workDay) = 5 THEN t5.shiftName ELSE null END) AS d5,
                        MAX(CASE WHEN Day(t5.workDay) = 6 THEN t5.shiftName ELSE null END) AS d6,
                        MAX(CASE WHEN Day(t5.workDay) = 7 THEN t5.shiftName ELSE null END) AS d7,
                        MAX(CASE WHEN Day(t5.workDay) = 8 THEN t5.shiftName ELSE null END) AS d8,
                        MAX(CASE WHEN Day(t5.workDay) = 9 THEN t5.shiftName ELSE null END) AS d9,
                        MAX(CASE WHEN Day(t5.workDay) = 10 THEN t5.shiftName ELSE null END) AS d10,
                        MAX(CASE WHEN Day(t5.workDay) = 11 THEN t5.shiftName ELSE null END) AS d11,
                        MAX(CASE WHEN Day(t5.workDay) = 12 THEN t5.shiftName ELSE null END) AS d12,
                        MAX(CASE WHEN Day(t5.workDay) = 13 THEN t5.shiftName ELSE null END) AS d13,
                        MAX(CASE WHEN Day(t5.workDay) = 14 THEN t5.shiftName ELSE null END) AS d14,
                        MAX(CASE WHEN Day(t5.workDay) = 15 THEN t5.shiftName ELSE null END) AS d15,
                        MAX(CASE WHEN Day(t5.workDay) = 16 THEN t5.shiftName ELSE null END) AS d16,
                        MAX(CASE WHEN Day(t5.workDay) = 17 THEN t5.shiftName ELSE null END) AS d17,
                        MAX(CASE WHEN Day(t5.workDay) = 18 THEN t5.shiftName ELSE null END) AS d18,
                        MAX(CASE WHEN Day(t5.workDay) = 19 THEN t5.shiftName ELSE null END) AS d19,
                        MAX(CASE WHEN Day(t5.workDay) = 20 THEN t5.shiftName ELSE null END) AS d20,
                        MAX(CASE WHEN Day(t5.workDay) = 21 THEN t5.shiftName ELSE null END) AS d21,
                        MAX(CASE WHEN Day(t5.workDay) = 22 THEN t5.shiftName ELSE null END) AS d22,
                        MAX(CASE WHEN Day(t5.workDay) = 23 THEN t5.shiftName ELSE null END) AS d23,
                        MAX(CASE WHEN Day(t5.workDay) = 24 THEN t5.shiftName ELSE null END) AS d24,
                        MAX(CASE WHEN Day(t5.workDay) = 25 THEN t5.shiftName ELSE null END) AS d25,
                        MAX(CASE WHEN Day(t5.workDay) = 26 THEN t5.shiftName ELSE null END) AS d26,
                        MAX(CASE WHEN Day(t5.workDay) = 27 THEN t5.shiftName ELSE null END) AS d27,
                        MAX(CASE WHEN Day(t5.workDay) = 28 THEN t5.shiftName ELSE null END) AS d28,
                        MAX(CASE WHEN Day(t5.workDay) = 29 THEN t5.shiftName ELSE null END) AS d29,
                        MAX(CASE WHEN Day(t5.workDay) = 30 THEN t5.shiftName ELSE null END) AS d30,
                        MAX(CASE WHEN Day(t5.workDay) = 31 THEN t5.shiftName ELSE null END) AS d31
                        FROM
                        (SELECT t3.*,t4.name
                        FROM
                        (SELECT t1.shiftTableId,t1.workDay,t1.userId,t2.shiftName
                        FROM company_data.shift_tables AS t1
                        INNER JOIN company_data.master_shifts AS t2
                        ON t1.shiftId = t2.shiftId
                        WHERE workDay BETWEEN :firstDay AND :lastDay) AS t3
                        INNER JOIN company_data.users AS t4
                        ON t3.userId = t4.id) AS t5
                        GROUP BY t5.userId',$param);
      // dd($items);
      return view('shift_table.index',compact('dates','items','holidays','calendar','firstDay'));
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
     * @param  \App\Models\ShiftTable  $shiftTable
     * @return \Illuminate\Http\Response
     */
    public function show(ShiftTable $shiftTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShiftTable  $shiftTable
     * @return \Illuminate\Http\Response
     */
    public function edit(ShiftTable $shiftTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShiftTable  $shiftTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShiftTable $shiftTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShiftTable  $shiftTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShiftTable $shiftTable)
    {
        //
    }
}
