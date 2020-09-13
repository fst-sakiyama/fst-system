<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Calendar\CalendarView;
use App\Calendar\CalendarTestView;

class CalendarController extends Controller
{
   public function show(){

		// $calendar = new CalendarView(time());
    $calendar = new CalendarTestView(time());

		return view('calendar.index', [
			"calendar" => $calendar
		]);
	}
}
