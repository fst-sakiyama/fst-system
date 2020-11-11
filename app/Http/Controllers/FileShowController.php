<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePost;
use App\Models\FstSystemInformation;
use App\Models\AddFilePost;
use App\Models\ProjectsFilePost;
use Storage;

class FileShowController extends Controller
{
    public function show(Request $request)
    {
      $item = FilePost::where('filePostId',$request->id)->first();

      return $this->commonShow($item);
    }

    public function addShow(Request $request)
    {
      $item = AddFilePost::where('addFilePostId',$request->id)->first();

      return $this->commonShow($item);
    }

    public function infoShow(Request $request)
    {
      $item = FstSystemInformation::where('id',$request->id)->first();

      return $this->commonShow($item);
    }

    public function projectsFileShow(Request $request)
    {
      $item = ProjectsFilePost::where('projectsFilePostId',$request->id)->first();
      return $this->commonShow($item);
    }

    public function commonShow($item)
    {
      $fileURL = $item->fileURL;
      $fileName = $item->fileName;
      $trimStr = DIRECTORY_SEPARATOR;
      $dirName = pathinfo($fileURL,PATHINFO_DIRNAME);
      $dir = basename($dirName);
      $fileRealName = pathinfo($fileURL, PATHINFO_BASENAME);
      $fileFullName = $dir.$trimStr.$fileRealName;
      $disk = Storage::disk('s3');
      $contents = $disk->get($fileFullName);
      $mimeType = $disk->mimeType($fileFullName);
      if($mimeType == 'application/pdf'){
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$fileName.'"');
      } elseif($mimeType == 'text/plain') {
        mb_language('Ja');
        $str = mb_convert_encoding($contents,"utf-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN,SJIS");
        echo nl2br("\n".$str);
      } elseif(preg_match('/^image/',$mimeType)=='1') {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="'.$fileName.'"');
      } else {
        return response($contents)->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'attachment; filename="'.$fileName.'"');
      }
    }
}
