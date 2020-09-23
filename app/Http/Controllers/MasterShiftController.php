<?php

namespace App\Http\Controllers;

use App\Models\MasterShift;
use Illuminate\Http\Request;

class MasterShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterShifts = MasterShift::all();

        return view('master_shifts.index',compact('masterShifts'));
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
     * @param  \App\Models\MasterShift  $masterShift
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $masterShift = MasterShift::find($id);

        return view('master_shifts.show',compact('masterShift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterShift  $masterShift
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterShift $masterShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterShift  $masterShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterShift $masterShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterShift  $masterShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterShift $masterShift)
    {
        //
    }
}
