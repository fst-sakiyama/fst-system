<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\WorkLoad;
use App\Models\ShiftTable;
use App\Models\TeamProject;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WorkLoadController extends Controller
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
        $year = 2020;
        $month = 11;
        $userId = 4;

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

        $workLoads = array();

        for($i=$firstDay->copy();$i<=$lastDay;$i->addDay()){
            $sid = ShiftTable::where(function($query) use($i,$userId){
                                $query->whereDate('workDay',$i->format('Y-m-d'))
                                      ->where('userId',$userId);
                              })->first();
            if($sid){
                $sid = $sid->shiftTableId;
                $t = $i->timestamp;
                $temp = WorkLoad::where('shiftTableId',$sid)->whereNotNull('workLoad');
                if($temp->count()){
                    $results = $temp->get();
                    foreach($results as $result){
                      $id = $result->teamProjectId;
                      $workLoads[$t][$id] = $result->workLoad;
                    }
                }
            }
        }

        $teamId = User::find($userId)->own_department;
        $teamProjects = TeamProject::where('workingTeamId',$teamId)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->orderBy('master_projects.clientId')->get();

        return view('work_load.index',compact('dates','holidays','calendar','firstDay','workLoads','teamProjects'));
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
     * @param  \App\Models\WorkLoad  $workLoad
     * @return \Illuminate\Http\Response
     */
    public function show(WorkLoad $workLoad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkLoad  $workLoad
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkLoad $workLoad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkLoad  $workLoad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkLoad $workLoad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkLoad  $workLoad
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkLoad $workLoad)
    {
        //
    }
}
