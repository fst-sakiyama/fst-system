<?php

/**
 *  ファイルをアップロードする
 *
 *  案件用のファイルをアップロードする
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterFileClassification;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\FilePost;
use Storage;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class UploaderController extends Controller
{
    private $messages = [
      'fileClassificationId.exists' => '※ファイルの分類を選択してください。',
      'file.required' => '※ファイルが選択されていません。'
    ];
    private $rules = [
      'fileClassificationId' => 'required|exists:master_file_classifications,fileClassificationId,deleted_at,NULL',
      'file' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $masterFileClassifications = MasterFileClassification::orderBy('order_of_row')->get();
      $masterProject = TeamProject::where('projectId',$request->id)->first();
      $filePosts = FilePost::where('teamProjectId',$request->id)->paginate(30);
      return view('uploader.index',compact('masterFileClassifications','masterProject','filePosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),$this->rules,$this->messages);

      if($validator->fails()){
        return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors($validator);
      }

      $projectId = $request->teamProjectId;
      $fileClassificationId = $request->fileClassificationId;
      $folderName = MasterFileClassification::where('fileClassificationId',$fileClassificationId)
                      ->first();
      $file = $request->file('file');
      $fileName = $file->getClientOriginalName();
      $path = Storage::disk('s3')->putFile('/'.($folderName->folderName), $file, 'public');
      $filePost = new FilePost;
      $filePost->teamProjectId = $projectId;
      $filePost->fileClassificationId = $fileClassificationId;
      $filePost->fileName = $fileName;
      $filePost->fileURL = Storage::disk('s3')->url($path);
      $filePost->save();

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = FilePost::find($id);
      /**
      *$items = Storage::disk('s3')->files('nothing');
      *dd($items);
      *dd($item->fileURL);
      *拡張子のみ表示
      *dd(File::extension($item->fileName));
      **/
      $masterFileClassifications = MasterFileClassification::select('fileClassificationId','fileClassification')->orderBy('order_of_row')->get();
      $masterFileClassifications = $masterFileClassifications->pluck('fileClassification','fileClassificationId');
      return view('uploader.edit',compact('item','masterFileClassifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /**
      *FilePost::find($id)->fill($request->all())->save();
      **/
      $item = FilePost::find($id);
      $item->fileClassificationId = $request->fileClassificationId;
      $item->fileName = ($request->fileName).'.'.($request->extension);
      $item->save();
      return redirect()->route('upload.index',['id'=>$request->projectId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      FilePost::find($id)->delete();
      return redirect()->back();
    }
}
