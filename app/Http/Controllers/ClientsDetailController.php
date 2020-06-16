<?php

namespace App\Http\Controllers;

use App\Models\master_project;
use Illuminate\Http\Request;

class ClientsDetailController extends Controller
{
  public function index(Request $request)
  {
    $items = master_project::select()
              ->join('master_client AS t2','master_project.clientId','=','t2.clientId')
              ->select('t2.clientName','t2.clientNameKana','master_project.*')
              ->where('master_project.clientId',$request->id)
              ->orderBy('t2.clientNameKana')
              ->orderBy('master_project.contractStartDate')
              ->orderBy('master_project.createdAt')
              ->get();
    return view('clients-detail.index',compact('items'));
  }
}
