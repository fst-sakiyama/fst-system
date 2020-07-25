<?php

namespace App\Http\Controllers;

use App\Models\TakeOverTheOperation;
use App\Models\AddTakeOverTheOperation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class TakeOverSearchController extends Controller
{
  public function search(Request $request)
  {
    $searchStart = $request->searchStart;
    $searchEnd = $request->searchEnd;
    $clientId = $request->clientId;
    $projectId = $request->projectId;
    $takeOverKeyWord = $request->takeOverKeyWord;
    $takeOver = $request->takeOver;
    $wellKnown = $request->wellKnown;

    /*
    dd($searchStart." ".$searchEnd." ".$clientId." ".$projectId." ".$takeOverKeyWord." ".$takeOver." ".$wellKnown);
    */

    $query = TakeOverTheOperation::withTrashed();

    if(empty($takeOver)) {
      $query->whereNotNull('wellKnown');
    }

    if(empty($wellKnown)){
      $query->whereNull('wellKnown');
    }

    if(!(empty($searchStart))) {
      $query->whereDate('created_at','>=',$searchStart);
    }

    if(!(empty($searchEnd))) {
      $query->whereDate('created_at','<=',$searchEnd);
    }

    if(!(empty($projectId))) {
      $query->where('projectId',$projectId);
    } else {
      if(!(empty($clientId))) {
        $query->whereHas('project',function($q) use($clientId){
          $q->where('clientId',$clientId);
        });
      }
    }

    if(!(empty($takeOverKeyWord))) {
      $query->where('takeOverContent','like','%'.$takeOverKeyWord.'%');
    }

    $items = $query->paginate(20);

    return view('take_over.search_result',compact('items'));
  }
}
