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
      // 第一引数はディレクトリの指定
      // 第二引数はファイル
      // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
      $path = Storage::disk('s3')->putFile('/'.($folderName->folderName), $file, 'public');
      // hogeディレクトリにアップロード
      // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
      // ファイル名を指定する場合はputFileAsを利用する
      // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
      $filePost = new FilePost;
      $filePost->projectId = $projectId;
      $filePost->fileClassificationId = $fileClassificationId;
      $filePost->fileName = $fileName;
      $filePost->fileURL = Storage::disk('s3')->url($path);
      $filePost->save();

      return redirect('file_posts?id='.$projectId);
  }
}
