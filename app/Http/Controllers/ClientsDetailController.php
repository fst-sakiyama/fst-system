<?php

namespace App\Http\Controllers;

use App\Models\master_client;
use App\Models\master_project;
use Illuminate\Http\Request;

class ClientsDetailController extends Controller
{
  public function index(Request $request)
  {
    $clientName = master_client::select('clientName')
                    ->where('clientId',$request->id)
                    ->first();
    $items = master_project::select()
              ->join('master_client AS t2','master_project.clientId','=','t2.clientId')
              ->select('t2.clientName','t2.clientNameKana','master_project.*')
              ->where('master_project.clientId',$request->id)
              ->orderBy('t2.clientNameKana')
              ->orderBy('master_project.contractStartDate')
              ->orderBy('master_project.createdAt')
              ->get();
    return view('clients_detail.index',compact('clientName','items'));
  }
}
