<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePost;
use App\Models\AddFilePost;
use Storage;

class FileShowController extends Controller
{
    public function show(Request $request)
    {
      $filePost = FilePost::where('filePostId',$request->id)
                  ->first();
      $trimStr = DIRECTORY_SEPARATOR;
      $fileURL = $filePost->fileURL;
      $dirName = pathinfo($fileURL,PATHINFO_DIRNAME);
      $dir = basename($dirName);
      $fileRealName = pathinfo($fileURL, PATHINFO_BASENAME);
      $fileFullName = $dir.$trimStr.$fileRealName;
      $disk = Storage::disk('s3');
      $contents = $disk->get($fileFullName);
      $mimeType = $disk->mimeType($fileFullName);
      if($mimeType == 'application/pdf'){
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$filePost->fileName.'"');
      } elseif($mimeType == 'text/plain') {
        mb_language('Ja');
        $str = mb_convert_encoding($contents,"utf-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN,SJIS");
        echo nl2br("\n".$str);
      } elseif(preg_match('/^image/',$mimeType)=='1') {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$filePost->fileName.'"');
      } else {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'attachment; filename="'.$filePost->fileName.'"');
      }
    }

    public function addShow(Request $request)
    {
      $filePost = AddFilePost::where('addFilePostId',$request->id)
                  ->first();
      $trimStr = DIRECTORY_SEPARATOR;
      $fileURL = $filePost->fileURL;
      $dirName = pathinfo($fileURL,PATHINFO_DIRNAME);
      $dir = basename($dirName);
      $fileRealName = pathinfo($fileURL, PATHINFO_BASENAME);
      $fileFullName = $dir.$trimStr.$fileRealName;
      $disk = Storage::disk('s3');
      $contents = $disk->get($fileFullName);
      $mimeType = $disk->mimeType($fileFullName);
      if($mimeType == 'application/pdf'){
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$filePost->fileName.'"');
      } elseif($mimeType == 'text/plain') {
        mb_language('Ja');
        $str = mb_convert_encoding($contents,"utf-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN,SJIS");
        echo nl2br("\n".$str);
      } elseif(preg_match('/^image/',$mimeType)=='1') {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$filePost->fileName.'"');
      } else {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'attachment; filename="'.$filePost->fileName.'"');
      }
    }
}
