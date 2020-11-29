<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\PaidLeave;
use Illuminate\Http\Request;

class PaidLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::orderBy('order_of_row')->get();

        return view('paid_leave.index',compact('items'));
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
