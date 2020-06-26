<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class MasterClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MasterClient::orderBy('clientNameKana','asc')->paginate(30);
        return view('master_clients.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
          'clientName.required' => '※顧客名は必須です。',
          'clientNameKana.required' => '※顧客名の読みは必須です。'
        ];

        $validator = Validator::make($request->all(),[
          'clientName' => 'required',
          'clientNameKana' => 'required',
        ],$messages);

        if($validator->fails()){
          return redirect()
                    ->route('master_clients.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        MasterClient::create($request->all());
        return redirect()->route('master_clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      /*
        $item = MasterClient::where('clientId',$request->id)->first();
        return view('master_clients.show',compact('item'));
      */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = MasterClient::where('clientId',$id)->first();
      return view('master_clients.edit',compact('item'));
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
      dd($request);
      MasterClient::where('clientId',$request->clientId)
        ->fill($request->all)->save();

      $items = MasterClient::orderBy('clientNameKana','asc')->paginate(30);
      return view('master_clients.index',compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
