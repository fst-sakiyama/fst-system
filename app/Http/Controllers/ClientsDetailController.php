<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use App\Models\MasterContractType;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class ClientsDetailController extends Controller
{
  private $messages = [
    'projectName.required' => '※案件名は必須です。',
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
                ->paginate(30);
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
      return view('clients_detail.create',compact('clientId','masterContractTypes'));
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

      MasterProject::create($request->all());
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
      return view('clients_detail.edit',compact('item','masterContractTypes'));
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

      MasterProject::find($id)->fill($request->all())->save();
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
