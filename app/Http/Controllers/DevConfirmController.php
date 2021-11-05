<?php

/**
 *  開発者の課題管理
 *
 *  課題名をfst_system_progressテーブルに登録
 *  課題の詳細をfst_system_progress_detailsテーブルに登録
 */

namespace App\Http\Controllers;

use App\Models\FstSystemProgress;
use App\Models\FstSystemProgressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class DevConfirmController extends Controller
{
  private $messages = [
    'fstSystemPlan.required' => '※課題は必須です。',
  ];
  private $rules = [
    'fstSystemPlan' => 'required',
  ];

  public function index()
  {
    $makePlans = FstSystemProgress::whereNull('planComp')
                  ->orderBy('created_at')
                  ->get();
    $nowProgress = FstSystemProgress::whereNull('doComp')
                  ->whereNotNull('planComp')
                  ->orderBy('planComp')
                  ->get();
    $doCompletes = FstSystemProgress::whereNotNull('doComp')
                  ->orderBy('doComp','desc')
                  ->paginate(10);
    $trashPlans = FstSystemProgress::onlyTrashed()
                  ->orderBy('deleted_at')
                  ->get();
    return view('dev_confirm.index',compact('makePlans','nowProgress','doCompletes','trashPlans'));
  }

  public function add(Request $request)
  {
    return view('dev_confirm.add');
  }

  public function create(Request $request)
  {
    $validator = Validator::make($request->all(),$this->rules,$this->messages);

    if($validator->fails()){
      return redirect()
                ->route('dev_confirm.add')
                ->withErrors($validator)
                ->withInput();
    }

    FstSystemProgress::create($request->all());
    return redirect()->route('dev_confirm.top');
  }

  public function editPlanComp(Request $request)
  {
    $now = Carbon::now();
    $item = FstSystemProgress::find($request->id);
    $item->planComp = $now;
    $item->save();
    return redirect()->route('dev_confirm.top');
  }

  public function editDoComp(Request $request)
  {
    $cnt = FstSystemProgressDetail::where('fstSystemProgressId',$request->id)
            ->whereNull('doComp')->count();

    if($cnt<>0){
      return redirect()->route('dev_confirm.top')
              ->with('flashMessage','完了していない課題が存在します');
    }

    $now = Carbon::now();
    $item = FstSystemProgress::find($request->id);
    $item->doComp = $now;
    $item->save();
    return redirect()->route('dev_confirm.top');
  }

  public function editDelete(Request $request)
  {
    FstSystemProgress::find($request->id)
      ->delete();
    return redirect()->route('dev_confirm.top');
  }

  public function restore(Request $request)
  {
    $item = FstSystemProgress::withTrashed()
            ->find($request->id)->restore();
    $item = FstSystemProgress::find($request->id);
    $item->planComp = null;
    $item->doComp = null;
    $item->save();
    return redirect()->route('dev_confirm.top');
  }

  public function dummy($id)
  {
    return redirect()->route('dev_confirm.top');
  }

}
