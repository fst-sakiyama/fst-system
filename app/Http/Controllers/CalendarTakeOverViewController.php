<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\TakeOverView\CalendarTakeOverView;
use App\Calendar\ExtraHoliday;

class CalendarTakeOverViewController extends Controller
{
  public function form(){

		$calendar = new CalendarTakeOverView(time());
		return view('calendar.take_over_view', [
			"calendar" => $calendar
		]);
	}
	public function update(Request $request){
		return redirect()
			->action("CalendarTakeOverViewController@form")
			->withStatus("保存しました");
	}
}
