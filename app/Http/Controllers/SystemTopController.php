<?php

namespace App\Http\Controllers;

use App\Models\FstSystemProgressDetail;
use App\Models\FstSystemRequestPlate;
use App\Models\FstSystemReplyToRequest;
use App\Models\MasterRequestClassification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class SystemTopController extends Controller
{
    private $messages = [
      'requestClassificationId.required' => '※要望の分類を選択してください。',
      'requestMessage.required' => '※要望の内容を記載してください。',
    ];
    private $rules = [
      'requestClassificationId' => 'required',
      'requestMessage' => 'required',
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
      $requestClassifications = MasterRequestClassification::all();
      $masterRequestClassifications = MasterRequestClassification::select('requestClassificationId','requestClassification')->get();
      $masterRequestClassifications = $masterRequestClassifications->pluck('requestClassification','requestClassificationId');

      $items = FstSystemRequestPlate::whereNull('doComp')->get();

      return view('system_top.create',compact('requestClassifications','masterRequestClassifications','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = Validator::make($request->all(),
      [
        'requestClassificationId.required' => '※要望の分類を選択してください。',
        'requestMessage.required' => '※要望の内容を入力してください。',
      ],
      [
        'requestClassificationId' => 'required',
        'requestMessage' => 'required',
      ]);

      if($validator->fails()){
        return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors($validator);
      }

      $requestPlates = new FstSystemRequestPlate;

      $requestPlates->fill([
        'requestClassificationId' => $request->requestClassificationId,
        'requestMessage' => $request->requestMessage,
      ])->save();

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

    public function doCompShow()
    {
      $requestClassifications = MasterRequestClassification::all();
      $items = FstSystemRequestPlate::whereNotNull('doComp')->orderBy('doComp','desc')->paginate(20);

      return view('system_top.docomp_show',compact('requestClassifications','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $requestPlate = FstSystemRequestPlate::find($id);
      return view('system_top.edit',compact('requestPlate'));
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
      $validator = Validator::make($request->all(),
      [
        'reply.required' => '※返信の内容を入力してください。',
      ],
      [
        'reply' => 'required',
      ]);

      if($validator->fails()){
        return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors($validator);
      }

      $replyToRequest = new FstSystemReplyToRequest;
      $replyToRequest->fill([
        'fstSystemRequestPlateId' => $request->fstSystemRequestPlateId,
        'reply' => $request->reply,
      ])->save();

      $requestClassifications = MasterRequestClassification::all();
      $masterRequestClassifications = MasterRequestClassification::select('requestClassificationId','requestClassification')->get();
      $masterRequestClassifications = $masterRequestClassifications->pluck('requestClassification','requestClassificationId');

      $items = FstSystemRequestPlate::all();

      return view('system_top.create',compact('requestClassifications','masterRequestClassifications','items'));
    }

    public function editDoComp($id)
    {
      $now = Carbon::now();
      $item = FstSystemRequestPlate::find($id);
      $item->doComp = $now;
      $item->save();

      return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requestDestroy($id)
    {
      FstSystemRequestPlate::find($id)->delete();
      return redirect()->back();
    }

    public function replyDestroy($id)
    {
      FstSystemReplyToRequest::find($id)->delete();
      return redirect()->back();
    }

}
