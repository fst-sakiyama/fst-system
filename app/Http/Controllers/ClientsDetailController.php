<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use Illuminate\Http\Request;

class ClientsDetailController extends Controller
{
  public function index(Request $request)
  {
    $clientName = MasterClient::select('clientName')
                ->where('clientId',$request->id)
                ->first();
    $items = MasterProject::where('clientId',$request->id)
              ->get();
    return view('clients_detail.index',compact('clientName','items'));
  }
}
