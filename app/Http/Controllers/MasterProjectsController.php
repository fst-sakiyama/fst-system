<?php

/**
 *  案件リストを表示する
 *
 *
 */

namespace App\Http\Controllers;

use App\Models\MasterContractType;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\MasterWorkingTeam;
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
        $items[$id] = MasterProject::where('contractTypeId',$id)
                      ->orderBy('clientId')
                      ->whereHas('client',function($query){
                                $query->orderByRaw('order_of_row IS NULL asc');
                                $query->orderBy('order_of_row');
                                $query->orderBy('updated_at','desc');
                                $query->orderBy('created_at','desc');
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
