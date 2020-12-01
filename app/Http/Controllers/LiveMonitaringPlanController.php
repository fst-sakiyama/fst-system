<?php

namespace App\Http\Controllers;

use App\Models\LiveMonitaringPlan;
use Illuminate\Http\Request;

class LiveMonitaringPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = LiveMonitaringPlan::all();

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
