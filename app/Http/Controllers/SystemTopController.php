<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemTopController extends Controller
{
    public function index(Request $request)
    {
      return view('system-top.index');
    }
}
