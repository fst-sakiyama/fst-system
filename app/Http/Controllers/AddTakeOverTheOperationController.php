<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\AddTakeOverTheOperation;
use App\Models\AddFilePost;
use App\Models\ReferenceLink;
use Illuminate\Http\Request;
use Storage;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AddTakeOverTheOperationController extends Controller
{
  private $messages = [
    'addTakeOverContent.required' => '※追記内容の入力は必須です。',
  ];
  private $rules = [
    'addTakeOverContent' => 'required',
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $dispDate = $request->dispDate;
      $takeOverTheOperation = TakeOverTheOperation::find($request->id);
      return view('add_take_over.create',compact('dispDate','takeOverTheOperation'));
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
      $dispDate = $request->dispDate;

      DB::beginTransaction();
      try{

        $addTakeOver = new AddTakeOverTheOperation;
        dump('通過0');
        $addTakeOver->fill([
          'takeOverId' => $request->takeOverId,
          'addTakeOverContent' => $request->addTakeOverContent,
        ])->save();
        $addTakeOverId = $addTakeOver->addTakeOverId;
        dump('通過1'.'pro：'.$request->projectId);
        $addFilePostId = array();
        $files = $request->file('files');
        if($files){
          for($i=0; $i<count($files); $i++){
            $file = $files[$i];
            if($file){
              $fileName = $file->getClientOriginalName();
              $path = Storage::disk('s3')->putFile('/takeOver', $file, 'public');
              $fileURL = Storage::disk('s3')->url($path);
              $addFilePost = new AddFilePost;
              $addFilePost->fill([
                'projectId' => $request->projectId,
                'fileName' => $fileName,
                'fileURL' => $fileURL,
              ])->save();
              $addFilePostId[] = $addFilePost->addFilePostId;
            }
          }
        }
        dump('通過2');
        if($addFilePostId){
          $addTakeOver = AddTakeOverTheOperation::find($addTakeOverId);
          $addTakeOver->files()->sync($addFilePostId);
        }
        dump('通過3');

        $linkId = array();
        for($i=0; $i<count($request->referenceLinkURL); $i++){
          $referenceLinkURL = $request->referenceLinkURL[$i];
          $remarks = $request->remarks[$i];
          if($referenceLinkURL){
            $referenceLink = new ReferenceLink;
            $referenceLink->fill([
              'referenceLinkURL' => $referenceLinkURL,
              'remarks' => $remarks,
            ])->save();
            $linkId[] = $referenceLink->linkId;
          }
        }
        dump('通過4');
        if($linkId){
          $addTakeOver = AddTakeOverTheOperation::find($addTakeOverId);
          $addTakeOver->links()->sync($linkId);
        }
        dump('通過5');
        DB::commit();

      }catch(\Exception $e) {

        DB::rollback();
        dd('エラーが発生しました');

      }

      return redirect()->route('take_over.index',['dispDate'=>$dispDate]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      AddTakeOverTheOperation::find($id)->delete();
      return redirect()->back();
    }
}
