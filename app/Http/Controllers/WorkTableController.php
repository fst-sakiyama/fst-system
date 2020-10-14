<?php

namespace App\Http\Controllers;

use App\Models\ShiftTable;
use App\Models\WorkTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;

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


        // テスト用年月
        $year = 2020;
        $month = 10;
        $userId = 2;


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

        foreach($workTables as $workTable)
        {
          $items += array(Carbon::create($workTable->workDay)->timestamp=>$workTable);
          // dump(Carbon::create($item->workDay)->timestamp);
        }
         // dd($items);


        return view('work_table.index',compact('dates','items','holidays','calendar','firstDay'));
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
    public function edit($d)
    {
      $editDate = Carbon::createFromTimestamp($d)->format('Y-m-d');
      $userId = 1;

      $workTable = DB::connection('mysql_two')->table('shift_tables')
                    ->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                    ->leftJoin('work_tables',function($join){
                        $join->on('shift_tables.workDay','=','work_tables.workTableWorkDay');
                        $join->on('shift_tables.userId','=','work_tables.workTableUserId');
                    })->whereDate('shift_tables.workDay',$editDate)
                      ->where('shift_tables.userId',$userId)
                      ->first();

        dd($workTable);

        return redirect()->route('work_table.edit');
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
