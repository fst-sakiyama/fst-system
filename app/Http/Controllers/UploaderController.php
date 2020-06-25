<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterFileClassification;
use App\Models\MasterProject;
use App\Models\FilePost;
use Storage;

class UploaderController extends Controller
{
  public function index(Request $request)
  {
    $masterFileClassifications = MasterFileClassification::all();
    $masterProject = MasterProject::where('projectId',$request->id)->first();
    return view('uploader.index',compact('masterFileClassifications','masterProject'));
  }

  public function upload(Request $request)
  {
      //dd($request->file('file'))
      $projectId = $request -> projectId;
      $fileClassificationId = $request -> fileClassificationId;
      $folderName = MasterFileClassification::where('fileClassificationId',$fileClassificationId)
                      ->first();
      $file = $request->file('file');
      $fileName = $file->getClientOriginalName();
      $path = Storage::disk('s3')->putFile('/'.($folderName->folderName), $file, 'public');
      $filePost = new FilePost;
      $filePost->projectId = $projectId;
      $filePost->fileClassificationId = $fileClassificationId;
      $filePost->fileName = $fileName;
      $filePost->fileURL = Storage::disk('s3')->url($path);
      $filePost->save();

      return redirect('file_posts?id='.$projectId);
  }
}
