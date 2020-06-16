<?php

namespace App\Http\Controllers;

use App\Models\master_client;
use Illuminate\Http\Request;

class MasterClinetController extends Controller
{
  public function index(Request $request)
  {
    $items = master_client::all();
    return view('master-clients.index',compact('items'));
  }
}
