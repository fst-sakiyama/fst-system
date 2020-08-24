<?php

namespace App\Http\Controllers;

use App\Models\FstSystemProgressDetail;
use App\Models\FstSystemRequestPlate;
use App\Models\MasterRequestClassification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class SystemTopController extends Controller
{
    private $messages = [
      'requestClassificationId.required' => '※要望の分類を選択してください。',
      'request.required' => '※要望の内容を記載してください。'
    ];
    private $rules = [
      'requestClassificationId' => 'required',
      'request' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $progressDetails = FstSystemProgressDetail::whereNotNull('doComp')
                          ->orderBy('doComp','desc')
                          ->paginate(5);

        return view('system_top.index',compact('progressDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $masterRequestClassifications = MasterRequestClassification::select('requestClassificationId','requestClassification')->get();
      $masterRequestClassifications = $masterRequestClassifications->pluck('requestClassification','requestClassificationId');
      return view('system_top.create',compact('masterRequestClassifications'));
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
        //
    }
}
