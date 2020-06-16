<?php

namespace App\Http\Controllers;

use App\Models\master_project;
use Illuminate\Http\Request;

class MasterProjectController extends Controller
{
  public function index(Request $request)
  {
    $items = master_project::select()
              ->join('master_client AS t2','master_project.clientId','=','t2.clientId')
              ->select('t2.clientName','t2.clientNameKana','master_project.*')
              ->orderBy('t2.clientNameKana')
              ->orderBy('master_project.contractStartDate')
              ->orderBy('master_project.createdAt')
              ->get();
    return view('master-projects.index',compact('items'));
  }
}
