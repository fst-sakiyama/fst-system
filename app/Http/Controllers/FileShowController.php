<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileShowController extends Controller
{
    public function show(Request $request)
    {
      $trim_str   =   DIRECTORY_SEPARATOR;
      $dirName = pathinfo($request->fileURL,PATHINFO_DIRNAME);
      $dir = basename($dirName);
      $fileName = pathinfo($request->fileURL, PATHINFO_BASENAME);
      $disk = Storage::disk('s3');
      $contents = $disk->get($dir.$trim_str.$fileName);
      $mimeType = $disk->mimeType($dir.$trim_str.$fileName);
      return response($contents)->header('Content-Type', $mimeType);
/*
      $headers = ['Content-disposition' => 'inline; filename="$request->fileName"'];



      return response()->file($request->fileURL, $headers);


      return response($request->fileURL, 200)
    ->header('Content-Type', 'application/pdf')
    ->header('Content-Disposition', 'inline; filename="' . $request->fileName . '"');
*/
    }
}
