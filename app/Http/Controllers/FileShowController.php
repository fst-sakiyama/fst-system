<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileShowController extends Controller
{
    public function show(Request $request)
    {
      $headers = ['Content-disposition' => 'inline; filename="$request->fileName"'];

      

      return response()->file($request->fileURL, $headers);

/*
      return response($request->fileURL, 200)
    ->header('Content-Type', 'application/pdf')
    ->header('Content-Disposition', 'inline; filename="' . $request->fileName . '"');
*/
    }
}
