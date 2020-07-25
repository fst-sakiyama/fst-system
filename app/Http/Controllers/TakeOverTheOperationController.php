<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\MasterClient;
use App\Models\MasterProject;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

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
                              ->get();
      $wellKnowns = TakeOverTheOperation::whereNotNull('wellKnown')
                    ->whereDate('created_at','<=',$dt)
                    ->get();
/*
*      $takeOversTrash = TakeOverTheOperation::onlyTrashed()
*                          ->whereNull('wellKnown')
*                          ->whereDate('deleted_at','<',$dt)
*                          ->get();
*/
      $takeOversTrash = TakeOverTheOperation::onlyTrashed()
                          ->whereNull('wellKnown')
                          ->paginate(20);
      $wellKnownsTrash = TakeOverTheOperation::onlyTrashed()
                          ->whereNotNull('wellKnown')
                          ->paginate(20);
      $masterClients = MasterClient::all();
      $masterProjects = MasterProject::all();
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
      $masterClients = MasterClient::all();
      $masterProjects = MasterProject::all();
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
      $request->request->remove('dispDate');
      $request->request->remove('clientId');
      TakeOverTheOperation::create($request->all());
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
      $masterClients = MasterClient::all();
      $masterProjects = MasterProject::all();
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
      $request->request->remove('dispDate');
      $request->request->remove('clientId');
      $item = TakeOverTheOperation::find($id);
      $item->fill($request->all());
      if(empty($request->wellKnown)){
        $item->wellKnown = null;
      }
      $item->save();
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TakeOverTheOperation::find($id)->delete();
      return redirect()->back();
    }

    public function restore(Request $request)
    {
      TakeOverTheOperation::onlyTrashed()->find($request->id)->restore();
      return redirect()->back();
    }
}
