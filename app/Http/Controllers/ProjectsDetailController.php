<?php

namespace App\Http\Controllers;

use App\Models\dummy;
use Illuminate\Http\Request;

class ProjectsDetailController extends Controller
{
  public function index(Request $request)
  {
    $items = dummy::select()
              ->join('master_client AS t2','master_project.clientId','=','t2.clientId')
              ->select('t2.clientName','t2.clientNameKana','master_project.*')
              ->where('master_project.clientId',$request->id)
              ->orderBy('t2.clientNameKana')
              ->orderBy('master_project.contractStartDate')
              ->orderBy('master_project.createdAt')
              ->get();
    return view('projects_detail.index',compact('items'));
  }
}
