<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WorkSheetsExport;
use Carbon\Carbon;

class ViewExportMultiple implements WithMultipleSheets
{
    use Exportable;

    private $year;
    private $month;

    public function __construct($year,$month)
    {
      $this->year = $year;
      $this->month = $month;
    }

    public function sheets():array
    {
      $sheets = [];

      $items = User::all();

      foreach ($items as $item) {
        if(!($item->display_shift)){ continue; }

        $userId = $item->id;
        $userName = $item->name;

        $calendar = new Calendar;
        $dates = $calendar->getCalendarDates($this->year,$this->month);
        // $dates = $calendar->getCalendarDates($year,9);

        $setting = new HolidaySetting;
        $setting->loadHoliday($this->year);

        $holidays = [];

        foreach ($dates as $date) {
          if($setting->isHoliday($date)){
            $holidays += array($date->timestamp=>$setting->jpHolidays[$date->timestamp]);
          } else {
            $holidays += array($date->timestamp=>'');
          }
        }

        // 月初、月末
        $firstDay = Carbon::create($this->year,$this->month,1)->firstOfMonth();
        $lastDay = Carbon::create($this->year,$this->month,1)->lastOfMonth();

        $workTables = DB::connection('mysql_two')->table('shift_tables')
                      ->join('master_shifts','shift_tables.shiftId','=','master_shifts.shiftId')
                      ->leftJoin('work_tables',function($join){
                          $join->on('shift_tables.workDay','=','work_tables.workTableWorkDay');
                          $join->on('shift_tables.userId','=','work_tables.workTableUserId');
                      })->whereBetween('shift_tables.workDay',[$firstDay,$lastDay])
                        ->where('shift_tables.userId',$userId)
                        ->get();

        if(empty($workTables[0])){
          $status .= $userName.'さん、';
          continue;
        }

        $items = [];
        $status = '';

        foreach($workTables as $workTable)
        {
          $items += array(Carbon::create($workTable->workDay)->timestamp=>$workTable);
        }

        $view = view('work_table.export',compact('userId','status','dates','items','holidays','calendar','firstDay'));

        $sheets[] = new WorkSheetsExport($view,$userName);

        $view = '';
      }

      return $sheets;
    }



}
