<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\MasterClient;
use App\Models\MasterProject;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TakeOverTheOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $items = TakeOverTheOperation::whereDate('timeLimit',Carbon::createFromTimestamp($request->dispDate))->get();
      $dispDate = $request->dispDate;
      return view('take_over.index',compact('items','dispDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $masterClients = MasterClient::all();
      $masterProjects = MasterProject::all();
      return view('take_over.create',compact('masterClients','masterProjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(!empty($request->wellKnown)){
        $request->wellKnown = Carbon::now();
      }
      $request->request->remove('clientId');
      TakeOverTheOperation::create($request->all());
      return redirect()->route('take_over.index');
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
    public function edit($id)
    {
        //
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
