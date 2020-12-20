<?php

namespace App\Http\Controllers;

use App\Models\MasterRegLiveShow;
use App\Models\RegLiveShowDetail;
use App\Models\RegLivePlan;
use App\Models\LiveMonitaringPlan;
use App\Models\LivePlan;
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
    public function index(Request $request)
    {
        $today = new Carbon('today');

        if($request->day){
            $day = $request->day;
        }else{
            $day = $today;
        }
        // $items = LiveMonitaringPlan::all();
        // 1:定例　2:振替　3:臨時
        $maxCreatedAt = RegLivePlan::where('classification','<>',3)->max('created_at');
        if($maxCreatedAt){
            $maxDay = new Carbon($maxCreatedAt);
            $diffD = $maxDay->diffInDays($today);
            if($diffD > 15){
                $this->createLivePlan();
            }
        }else{
            $this->createLivePlan();
        }
        $regLive = RegLivePlan::select('reg_live_plans.*')
                    ->join('reg_live_show_details','reg_live_plans.regLiveDetailId','=','reg_live_show_details.regLiveDetailId')
                    ->whereBetween('eventDay',[$day,$day->copy()->addDays(5)])
                    ->orderBy('eventDay')->orderBy('reg_live_show_details.startHour')->orderBy('reg_live_show_details.startMinute')
                    ->get();
        $items = LivePlan::where('exe',1)->orderBy('eventDay')
                ->orderBy('startHour')->orderBy('startMinute')
                ->orderBy('endHour')->orderBy('endMinute')
                ->orderBy('issueNo')
                ->get();

        return view('live_monitaring_plan.index',compact('items','regLive'));
    }

    public function createLivePlan()
    {
        $dt = new Carbon('yesterday');
        // $dt = new Carbon('2020-12-25');
        $year = $dt->format('Y');
        $holidaySet = new HolidaySetting;
        $holidaySet->loadHoliday($dt->format('Y'));

        // forHolidays= 1:実施 2:中止 3:振替
        for($i = 0; $i < 20; $i++){
            $dt->addDay();
            if($year !== $dt->format('Y')){
                $holidaySet->loadHoliday($dt->format('Y'));
            }
            $holidayBool = $holidaySet->isHoliday($dt);
            $this->regLivePlanRegist($dt,$holidayBool);
        }
    }

    public function regLivePlanRegist($dt,$holidayBool)
    {
        $items = RegLiveShowDetail::where('weekDay',$dt->weekDay())->get();
        foreach($items as $item){
            $d = $dt->copy();
            $classificationNum = 1; // 定例
            if($holidayBool){
                if($item->regLive->forHolidays == 3){ // 振替だったら
                    $classificationNum = 2; // 振替
                    $d->addDay();
                }else{
                    continue;
                }
            }
            RegLivePlan::updateOrCreate(
                ['eventDay'=>$d->format('Y-m-d'),'regLiveDetailId'=>$item->regLiveDetailId],
                ['classification'=>$classificationNum,'eventDay'=>$d->format('Y-m-d'),'regLiveDetailId'=>$item->regLiveDetailId]
            );
        }
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

    public function masterStore(Request $request)
    {
        DB::beginTransaction();
        try{
            $item = new MasterRegLiveShow;
            $item->liveName = $request->liveName;
            $item->forHolidays = $request->forHolidays;
            $item->save();
            $regLiveId = $item->regLiveId;
            for($i=0;$i<count($request->weekDay);$i++){
                if(isset($request->weekDay[$i]) && isset($request->startHour[$i]) && isset($request->startMinute[$i])){
                    $item = new RegLiveShowDetail;
                    $item->regLiveId = $regLiveId;
                    $item->weekDay = $request->weekDay[$i];
                    $item->startHour = $request->startHour[$i];
                    $item->startMinute = $request->startMinute[$i];
                    $item->save();
                }
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            dd('エラーが発生しました');
        }
        return redirect()->route('live_monitaring_plan.masterShow');
    }

    public function regLiveCreate()
    {
        $items = MasterRegLiveShow::select('regLiveId','liveName')
                        ->get()
                        ->pluck('liveName','regLiveId');

        return view('live_monitaring_plan.regLiveCreate',compact('items'));
    }

    public function regLiveStore(Request $request)
    {
        DB::beginTransaction();
        try{
            $eventDay = new Carbon($request->eventDay);
            $item = new RegLiveShowDetail;
            $item->regLiveId = $request->regLiveId;
            $item->weekDay = $eventDay->dayOfWeek;
            $item->startHour = $request->startHour;
            $item->startMinute = $request->startMinute;
            $item->save();
            $regLivePlans = new RegLivePlan;
            $regLivePlans->classification = 3;
            $regLivePlans->eventDay = $eventDay;
            $regLivePlans->regLiveDetailId = $item->regLiveDetailId;
            $regLivePlans->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            dd('エラーが発生しました');
        }
        return redirect()->route('live_monitaring_plan.index');
    }

    public function liveCreate()
    {
        return view('live_monitaring_plan.liveCreate');
    }

    public function liveStore(Request $request)
    {
        LivePlan::create($request->all());
        return redirect()->route('live_monitaring_plan.index');
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
