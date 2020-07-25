<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\AddTakeOverTheOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
      $request->request->remove('dispDate');
      AddTakeOverTheOperation::create($request->all());
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
