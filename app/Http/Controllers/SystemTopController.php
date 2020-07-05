<?php

namespace App\Http\Controllers;

use App\Models\FstSystemProgress;
use App\Models\FstSystemProgressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class SystemTopController extends Controller
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
    return view('system_top.index',compact('makePlans','nowProgress','doCompletes','trashPlans'));
  }

  public function add(Request $request)
  {
    return view('system_top.add');
  }

  public function create(Request $request)
  {
    $validator = Validator::make($request->all(),$this->rules,$this->messages);

    if($validator->fails()){
      return redirect()
                ->route('system_top.add')
                ->withErrors($validator)
                ->withInput();
    }

    FstSystemProgress::create($request->all());
    return redirect()->route('top');
  }

  public function editPlanComp(Request $request)
  {
    $now = Carbon::now();
    $item = FstSystemProgress::find($request->id);
    $item->planComp = $now;
    $item->save();
    return redirect()->route('top');
  }

  public function editDoComp(Request $request)
  {
    $cnt = FstSystemProgressDetail::where('fstSystemProgressId',$request->id)
            ->whereNull('doComp')->count();

    if($cnt<>0){
      return redirect()->route('top')
              ->with('flashMessage','完了していない課題が存在します');
    }

    $now = Carbon::now();
    $item = FstSystemProgress::find($request->id);
    $item->doComp = $now;
    $item->save();
    return redirect()->route('top');
  }

  public function editDelete(Request $request)
  {
    FstSystemProgress::find($request->id)
      ->delete();
    return redirect()->route('top');
  }

  public function restore(Request $request)
  {
    $item = FstSystemProgress::withTrashed()
            ->find($request->id)->restore();
    $item = FstSystemProgress::find($request->id);
    $item->planComp = null;
    $item->doComp = null;
    $item->save();
    return redirect()->route('top');
  }

  public function dummy($id)
  {
    return redirect()->route('top');
  }

}
