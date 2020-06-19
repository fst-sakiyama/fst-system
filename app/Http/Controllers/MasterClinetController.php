<?php

namespace App\Http\Controllers;

use App\Models\master_client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MasterClinetController extends Controller
{
  public function index(Request $request)
  {
    $items = master_client::paginate(30);
    return view('master_clients.index',compact('items'));
  }
}
