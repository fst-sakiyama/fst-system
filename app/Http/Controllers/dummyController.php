<?php

namespace App\Http\Controllers;

use App\Models\MasterClient;
use App\Models\MasterProject;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $masterProjects = MasterProject::all();
      $masterClients = MasterClient::all();
      $dates = $this->getCalendarDates($request->year,$request->month);
      return view('dummy.index',compact('masterProjects','masterClients','dates'));
    }

    public function getCalendarDates($year,$month)
    {
      // 年月の指定がないときは、現在の年月でカレンダーを作成する
      if(empty($year) || empty($month)){
        $year = date("Y");
        $month = date("m");
      }

      $date = new Carbon("{$year}-{$month}-01");
      // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
      $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;

      $date->subDay($date->dayOfWeek);
      // 同上。右下の隙間のための計算。
      $count = 31 + $addDay + $date->dayOfWeek;
      $count = ceil($count / 7) * 7;
      $dates = [];

      for ($i = 0; $i < $count; $i++, $date->addDay()) {
          // copyしないと全部同じオブジェクトを入れてしまうことになる
          $dates[] = $date->copy();
      }
      return $dates;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
