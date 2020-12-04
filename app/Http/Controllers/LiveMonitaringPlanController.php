<?php

namespace App\Http\Controllers;

use App\Models\MasterRegLiveShow;
use App\Models\RegLiveShowDetail;
use App\Models\RegLivePlan;
use App\Models\LiveMonitaringPlan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Classes\Calendar;
use App\Classes\HolidaySetting;

class LiveMonitaringPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = LiveMonitaringPlan::all();

        // 1:定例　2:振替　3:臨時
        $maxCreatedAt = RegLivePlan::where('classification','<>',3)->max('created_at');
        if($maxCreatedAt){
            $today = new Carbon('today');
            $diffD = $maxCreatedAt->diffInDays($today);
            if($diffD > 10){

            }
            dd($diffD);
        }
        $items = null;
        return view('live_monitaring_plan.index',compact('items'));
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

    public function masterShow()
    {
        $items = MasterRegLiveShow::all();

        return view('live_monitaring_plan.masterShow',compact('items'));
    }

    public function masterCreate()
    {
        $items = MasterRegLiveShow::all();

        return view('live_monitaring_plan.masterCreate',compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiveMonitaringPlan  $liveMonitaringPlan
     * @return \Illuminate\Http\Response
     */
    public function show(LiveMonitaringPlan $liveMonitaringPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveMonitaringPlan  $liveMonitaringPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveMonitaringPlan $liveMonitaringPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveMonitaringPlan  $liveMonitaringPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiveMonitaringPlan $liveMonitaringPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveMonitaringPlan  $liveMonitaringPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveMonitaringPlan $liveMonitaringPlan)
    {
        //
    }
}
