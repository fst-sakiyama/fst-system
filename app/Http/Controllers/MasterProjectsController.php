<?php

namespace App\Http\Controllers;

use App\Models\MasterContractType;
use App\Models\MasterProject;
use App\Models\TeamProject;
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
      $contractTypes = MasterContractType::all();

      foreach($contractTypes as $contractTypeId)
      {
        $id = $contractTypeId->contractTypeId;
        $items[$id] = TeamProject::whereHas('project',function($query) use($id){
          $query->where('contractTypeId',$id);
          $query->whereHas('client',function($query){
            $query->orderByRaw('order_of_row IS NULL asc');
            $query->orderBy('order_of_row');
            $query->orderByRaw('slack_prefix IS NULL asc');
            $query->orderBy('slack_prefix');
          });
        })->get();
      }

      return view('master_projects.index',compact('contractTypes','items'));
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
