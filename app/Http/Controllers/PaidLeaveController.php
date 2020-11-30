<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\PaidLeave;
use App\Models\ShiftTable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaidLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 現在の有給はmaster_shiftsのid 9(有給) 10(半給) 19(半給宅)
        $items = PaidLeave::select('paid_leaves.*')
                ->join('users','paid_leaves.userId','=','users.id')
                ->orderBy('users.order_of_row')
                ->get();

        $today = Carbon::today();
        $paidLeave = array();
        foreach($items as $item){
            $cnt = 0;
            $id = $item->userId;
            $dt = $item->grantDate;
            if($dt->copy()->addYear() <= $today){
                $paidLeave[$id][1]=-1;
                $paidLeave[$id][3]=-1;
            }else{
                $firstDay = $dt->copy()->subYear()->format('Y-m-d');
                $lastDay = $dt->copy()->subDay()->format('Y-m-d');

                $paidLeave[$id][0]=$firstDay.'～';
                $paidLeave[$id][1]=$this->cntPaidLeave($id,$firstDay,$lastDay);

                $firstDay = $dt->copy()->format('Y-m-d');
                $lastDay = $dt->copy()->addYear()->subDay()->format('Y-m-d');

                $paidLeave[$id][2]=$firstDay.'～';
                $paidLeave[$id][3]=$this->cntPaidLeave($id,$firstDay,$lastDay);
            }
        }

        return view('paid_leave.index',compact('items','paidLeave'));
    }

    function cntPaidLeave($id,$firstDay,$lastDay)
    {
        $cnt = 0;

        $cnt += ShiftTable::where(function($query) use($id,$firstDay,$lastDay){
            $query->where('userId',$id)
                    ->whereBetween('workDay',[$firstDay,$lastDay])
                    ->where('shiftId',9);
        })->count() * 2;

        $cnt += ShiftTable::where(function($query) use($id,$firstDay,$lastDay){
            $query->where('userId',$id)
                    ->whereBetween('workDay',[$firstDay,$lastDay])
                    ->where('shiftId',10)
                    ->orWhere('shiftId',19);
        })->count();

        return $cnt;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = User::orderBy('users.order_of_row')
                ->get();

        return view('paid_leave.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

     }

    public function ajax_store(Request $request)
    {
        $res = PaidLeave::updateOrCreate(
            ['userId'=>$request->id],
            ['userId'=>$request->id,'dispPaidLeave'=>1,'grantDate'=>$request->grantDate]
        );

        return response()->json(['grantDate'=>$res->grantDate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaidLeave  $paidLeave
     * @return \Illuminate\Http\Response
     */
    public function show(PaidLeave $paidLeave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaidLeave  $paidLeave
     * @return \Illuminate\Http\Response
     */
    public function edit(PaidLeave $paidLeave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaidLeave  $paidLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaidLeave $paidLeave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaidLeave  $paidLeave
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaidLeave $paidLeave)
    {
        //
    }
}
