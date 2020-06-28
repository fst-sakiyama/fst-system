<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class ClientsDetailController extends Controller
{
  private $messages = [
    'projectName.required' => '※案件名は必須です。',
  ];
  private $rules = [
    'projectName' => 'required',
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $clientName = MasterClient::select('clientName')
                  ->where('clientId',$request->id)
                  ->first();
      $items = MasterProject::where('clientId',$request->id)
                ->paginate(30);
      return view('clients_detail.index',compact('clientName','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients_detail.create');
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
      return redirect()->route('clients_detail.index');
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
      return view('clients_detail.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $validator = Validator::make($request->all(),$this->rules,$this->messages);

      if($validator->fails()){
        return redirect()
                  ->route('clients_detail.edit')
                  ->withErrors($validator)
                  ->withInput();
      }

      MasterProject::find($request->clientId)->fill($request->all())->save();

      return redirect()->route('clients_detail.index');
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
      return redirect()->route('clients_detail.index');
    }
}
