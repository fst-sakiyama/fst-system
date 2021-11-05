<?php

/**
 *  案件を登録する
 *
 *  案件としてmaster_projectsテーブルに登録される
 *  対応するチームごとにチームプロジェクトIDが振られ、team_projectsテーブルに登録される
 */

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\TeamProject;
use App\Models\MasterContractType;
use App\Models\MasterWorkingTeam;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClientsDetailController extends Controller
{
  private $messages = [
    'projectName.required' => '※案件名は必須です。',
    'contractTypeId.required' => '※契約形態を選択してください。',
    'contractTypeId.exists' => '※契約形態を選択してください。'
  ];
  private $rules = [
    'projectName' => 'required',
    'clientId'=>'required|exists:master_clients,clientId,deleted_at,NULL',
    'contractTypeId'=>'required|exists:master_contract_types,contractTypeId,deleted_at,NULL',
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $clientId = $request->id;
      $clientName = MasterClient::select('clientName')
                  ->where('clientId',$clientId)
                  ->first();

      $items = MasterProject::where('clientId',$clientId)
                    ->orderBy('clientId')
                    ->whereHas('client',function($query){
                              $query->orderByRaw('order_of_row IS NULL asc');
                              $query->orderBy('order_of_row');
                              $query->orderBy('updated_at','desc');
                              $query->orderBy('created_at','desc');
                      })->get();

      return view('clients_detail.index',compact('clientId','clientName','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $clientId = $request->id;
      $masterContractTypes = MasterContractType::select('contractTypeId','contractType')->get();
      $masterContractTypes = $masterContractTypes->pluck('contractType','contractTypeId');
      $masterWorkingTeams = MasterWorkingTeam::all();
      return view('clients_detail.create',compact('clientId','masterContractTypes','masterWorkingTeams'));
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
                  ->route('clients_detail.create')
                  ->withErrors($validator)
                  ->withInput();
      }

      if(!$request->workingTeamId){
        return redirect()->back()->with('message','対応チームは必ず一つ以上選択してください。')->withInput();
      }

      DB::beginTransaction();

      try{
          $masterProject = new MasterProject;

          $masterProject->fill([
              'clientId' => $request->clientId,
              'contractTypeId' => $request->contractTypeId,
              'projectName' => $request->projectName,
              'startDate' => $request->startDate,
              'endDate' => $request->endDate,
              'project_detail' => $request->master_project_detail,
          ])->save();
          $masterProjectId = $masterProject->projectId;

          foreach($request->workingTeamId as $key=>$val){
              $teamProject = new TeamProject;
              $teamProject->fill([
                  'projectId' => $masterProjectId,
                  'workingTeamId' => $val,
                  'slack_channel_name' => $request->slack_channel_name[$key],
                  'project_detail' => $request->project_detail[$key],
              ])->save();
          }

          DB::commit();

      }catch(\Exception $e) {

        DB::rollback();
        dd('エラーが発生しました');

      }

      return redirect()->route('clients_detail.index',['id'=>$request->clientId]);
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
      $item = MasterProject::find($id);
      $masterContractTypes = MasterContractType::select('contractTypeId','contractType')->get();
      $masterContractTypes = $masterContractTypes->pluck('contractType','contractTypeId');
      $masterWorkingTeams = MasterWorkingTeam::all();
      return view('clients_detail.edit',compact('item','masterContractTypes','masterWorkingTeams'));
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
                  ->route('clients_detail.edit')
                  ->withErrors($validator)
                  ->withInput();
      }

      if(!$request->workingTeamId){
        return redirect()->back()->with('message','対応チームは必ず一つ以上選択してください。')->withInput();
      }

      DB::beginTransaction();

      try{
          $masterProject = MasterProject::find($id);

          $masterProject->fill([
              'clientId' => $request->clientId,
              'contractTypeId' => $request->contractTypeId,
              'projectName' => $request->projectName,
              'startDate' => $request->startDate,
              'endDate' => $request->endDate,
              'project_detail' => $request->master_project_detail,
          ])->save();

          foreach($request->teamProjectId as $val){
              TeamProject::find($val)->delete();
          }

          foreach($request->workingTeamId as $key=>$val){
              $teamProject = new TeamProject;
              $teamProject->fill([
                  'projectId' => $id,
                  'workingTeamId' => $val,
                  'slack_channel_name' => $request->slack_channel_name[$key],
                  'project_detail' => $request->project_detail[$key],
              ])->save();
          }

          DB::commit();

      }catch(\Exception $e) {

        DB::rollback();
        dd('エラーが発生しました');

      }

      return redirect()->route('clients_detail.index',['id'=>$request->clientId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      MasterProject::find($id)->delete();
      return redirect()->back();
    }
}
