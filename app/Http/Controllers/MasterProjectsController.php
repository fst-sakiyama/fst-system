<?php

namespace App\Http\Controllers;

use App\Models\MasterProject;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MasterProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = MasterProject::select('master_projects.*')
                ->join('master_clients','master_projects.clientId','=','master_clients.clientId')
                ->orderByRaw('master_clients.order_of_row IS NULL asc')
                ->orderBy('master_clients.order_of_row')
                ->orderByRaw('master_clients.slack_prefix IS NULL asc')
                ->orderBy('master_clients.slack_prefix')
                ->orderBy('master_clients.clientName')
                ->orderBy('updated_at')
                ->paginate(30);
      return view('master_projects.index',compact('items'));
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
