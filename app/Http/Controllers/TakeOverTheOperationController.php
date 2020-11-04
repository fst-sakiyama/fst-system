<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\AddFilePost;
use App\Models\ReferenceLink;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TakeOverTheOperationController extends Controller
{
  private $messages = [
    'projectId.required' => '※顧客名、案件名の選択は必須です。',
    'takeOverContent.required' => '※内容の入力は必須です。',
  ];
  private $rules = [
    'projectId' => 'required',
    'takeOverContent' => 'required',
  ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $dispDate = $request->dispDate;
      $dt = Carbon::createFromTimestamp($dispDate);
      $takeOvers = TakeOverTheOperation::whereNull('wellKnown')
                    ->whereNull('timeLimit')
                    ->whereDate('created_at','<=',$dt)
                    ->orderBy('created_at')
                    ->get();
      $takeOversTimeLimit = TakeOverTheOperation::whereNull('wellKnown')
                            ->whereNotNull('timeLimit')
                            ->whereDate('created_at','<=',$dt)
                            ->orderBy('timeLimit')
                            ->orderBy('created_at')
                            ->get();
/*
*      $takeOversTrashToday = TakeOverTheOperation::onlyTrashed()
*                              ->whereNull('wellKnown')
*                              ->whereDate('deleted_at',$dt)
*                              ->get();
*/
      $takeOversTrashToday = TakeOverTheOperation::onlyTrashed()
                              ->whereNull('wellKnown')
                              ->whereDate('created_at','<=',$dt)
                              ->whereRaw('deleted_at >= NOW() - INTERVAL 1 DAY')
                              ->orderBy('deleted_at')
                              ->orderBy('created_at')
                              ->get();
      $wellKnowns = TakeOverTheOperation::whereNotNull('wellKnown')
                    ->whereDate('created_at','<=',$dt)
                    ->orderBy('wellKnown')
                    ->orderBy('created_at')
                    ->get();
/*
*      $takeOversTrash = TakeOverTheOperation::onlyTrashed()
*                          ->whereNull('wellKnown')
*                          ->whereDate('deleted_at','<',$dt)
*                          ->get();
*/
      $takeOversTrash = TakeOverTheOperation::onlyTrashed()
                          ->whereNull('wellKnown')
                          ->whereDate('created_at','<=',$dt)
                          ->orderBy('deleted_at')
                          ->orderBy('created_at')
                          ->paginate(20);
      $wellKnownsTrash = TakeOverTheOperation::onlyTrashed()
                          ->whereNotNull('wellKnown')
                          ->whereDate('created_at','<=',$dt)
                          ->orderBy('deleted_at')
                          ->orderBy('created_at')
                          ->paginate(20);
      $masterClients = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->join('master_clients','master_projects.clientId','=','master_clients.clientId')
                        ->distinct()->addSelect('master_clients.clientId','master_clients.clientName')->get();
      $masterProjects = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->get();
      return view('take_over.index',compact('dispDate','takeOvers','takeOversTimeLimit','takeOversTrashToday','wellKnowns','takeOversTrash','wellKnownsTrash','masterClients','masterProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $dispDate = $request->dispDate;
      $masterClients = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->join('master_clients','master_projects.clientId','=','master_clients.clientId')
                        ->distinct()->addSelect('master_clients.clientId','master_clients.clientName')->get();
      $masterProjects = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->get();
      return view('take_over.create',compact('dispDate','masterClients','masterProjects'));
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
                  ->route('take_over.create')
                  ->withErrors($validator)
                  ->withInput();
      }

      if(!empty($request->wellKnown)){
        $request->wellKnown = Carbon::now();
      }
      $dispDate = $request->dispDate;

      DB::beginTransaction();
      try{
        $takeOver = new TakeOverTheOperation;
        $takeOver->fill([
          'teamProjectId' => $request->projectId,
          'takeOverContent' => $request->takeOverContent,
          'timeLimit' => $request->timeLimit,
          'wellKnown' => $request->wellKnown,
        ])->save();
        $takeOverId = $takeOver->takeOverId;

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
              $addFilePost->teamProjectId = $request->projectId;
              $addFilePost->fileName = $fileName;
              $addFilePost->fileURL = $fileURL;
              $addFilePost->save();
              $addFilePostId[] = $addFilePost->addFilePostId;
            }
          }
        }

        if($addFilePostId){
          $takeOver = TakeOverTheOperation::find($takeOverId);
          $takeOver->files()->sync($addFilePostId);
        }

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
        if($linkId){
          $takeOver = TakeOverTheOperation::find($takeOverId);
          $takeOver->links('pagination::bootstrap-4')->sync($linkId);
        }

        DB::commit();

      } catch(\Exception $e) {

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
    public function edit(Request $request,$id)
    {
        //
    }

    public function doEdit(Request $request)
    {
      $dispDate = $request->dispDate;
      $masterClients = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->join('master_clients','master_projects.clientId','=','master_clients.clientId')
                        ->distinct()->addSelect('master_clients.clientId','master_clients.clientName')->get();
      $masterProjects = TeamProject::where('workingTeamId',4)
                        ->join('master_projects','team_projects.projectId','=','master_projects.projectId')
                        ->get();
      $takeOverTheOperation = TakeOverTheOperation::find($request->id);
      return view('take_over.edit',compact('dispDate','masterClients','masterProjects','takeOverTheOperation'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $validator = Validator::make($request->all(),$this->rules,$this->messages);

      if($validator->fails()){
        return redirect()
                  ->route('take_over.doEdit',['id'=>$id,'dispDate'=>$request->dispDate])
                  ->withErrors($validator)
                  ->withInput();
      }

      $dispDate = $request->dispDate;
      if(empty($request->wellKnown)){
        $wellKnown =  null;
      }else{
        $wellKnown = $request->wellKnown;
      }

      DB::beginTransaction();
      try{
        $takeOver = TakeOverTheOperation::find($id);
        $takeOver->fill([
          'teamProjectId' => $request->projectId,
          'takeOverContent' => $request->takeOverContent,
          'timeLimit' => $request->timeLimit,
          'wellKnown' => $wellKnown,
        ])->save();

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
                'teamProjectId' => $request->projectId,
                'fileName' => $fileName,
                'fileURL' => $fileURL,
              ])->save();
              $addFilePostId[] = $addFilePost->addFilePostId;
            }
          }
        }
        if($addFilePostId){
          $takeOver = TakeOverTheOperation::find($id);
          $takeOver->files()->attach($addFilePostId);
        }

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
        if($linkId){
          $takeOver = TakeOverTheOperation::find($id);
          $takeOver->links('pagination::bootstrap-4')->attach($linkId);
        }

        DB::commit();

      } catch(\Exception $e) {

        DB::rollback();
        dd('エラーが発生しました');

      }

      return redirect()->route('take_over.index',['dispDate'=>$dispDate]);
    }

    public function doWellKnown(Request $request)
    {
      $item = TakeOverTheOperation::find($request->id);
      $item->wellKnown = date('Y-m-d');
      $item->save();
      $dispDate = $request->dispDate;
      return redirect()->route('take_over.index',['dispDate'=>$dispDate]);
    }

    public function rmWellKnown(Request $request)
    {
      $item = TakeOverTheOperation::find($request->id);
      $item->wellKnown = null;
      $item->save();
      $dispDate = $request->dispDate;
      return redirect()->route('take_over.index',['dispDate'=>$dispDate]);
    }

    public function filedel(Request $request)
    {
      AddFilePost::find($request->id)->delete();
      return response()->json(['url'=>url('/take_over?dispDate='.$request->dispDate)]);
    }

    public function linkdel(Request $request)
    {
      ReferenceLink::find($request->id)->delete();
      return response()->json(['url'=>url('/take_over?dispDate='.$request->dispDate)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //TakeOverTheOperation::find($id)->delete();
      TakeOverTheOperation::destroy($id);
      return redirect()->back();
    }

    public function restore(Request $request)
    {
      TakeOverTheOperation::onlyTrashed()->find($request->id)->restore();
      return redirect()->back();
    }
}
