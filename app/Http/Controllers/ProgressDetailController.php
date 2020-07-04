<?php

namespace App\Http\Controllers;

use App\Models\FstSystemProgress;
use App\Models\FstSystemProgressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressDetailController extends Controller
{
  private $messages = [
    'fstSystemPlanDetail.required' => '※課題詳細は必須です。',
  ];
  private $rules = [
    'fstSystemPlanDetail' => 'required',
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $fstSystemPlan = FstSystemProgress::select('fstSystemProgressId','fstSystemPlan')
                        ->where('fstSystemProgressId',$request->id)
                        ->first();
      $items = FstSystemProgressDetail::where('fstSystemProgressId',$request->id)
                ->orderBy('created_at')->get();

      return view('progress_detail.index',compact('fstSystemPlan','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $fstSystemProgressId = $request->id;
      return view('progress_detail.create',compact('fstSystemProgressId'));
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
                  ->route('progress_detail.create')
                  ->withErrors($validator)
                  ->withInput();
      }

      FstSystemProgressDetail::create($request->all());
      return redirect()->route('progress_detail.index',['id'=>$request->fstSystemProgressId]);
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
      $item = FstSystemProgressDetail::find($id);
      return view('progress_detail.edit',compact('item'));
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
      $validator = Validator::make($request->all(),$this->rules,$this->messages);

      if($validator->fails()){
        return redirect()
                  ->back()
                  ->withErrors($validator)
                  ->withInput();
      }

      FstSystemProgressDetail::find($id)->fill($request->all())->save();
      return redirect()->route('progress_detail.index',['id'=>$request->fstSystemProgressId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      FstSystemProgressDetail::find($id)->delete();
      return redirect()->back();
    }
}
