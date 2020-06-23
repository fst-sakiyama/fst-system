<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileShowController extends Controller
{
    public function show(Request $request)
    {
      return response($request->url, 200)
          ->header('Content-Type', 'application/pdf')
          ->header('Content-Disposition', 'inline; filename="' . $request->fileName . '"');
    }
}
