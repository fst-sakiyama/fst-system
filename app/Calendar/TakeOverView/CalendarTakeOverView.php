<?php
namespace App\Calendar\TakeOverView;

use Carbon\Carbon;
use App\Calendar\CalendarView;
/**
* 表示用
*/
class CalendarTakeOverView extends CalendarView {

  protected function getWeek(Carbon $date, $index = 0){
		$week = new CalendarWeekDayTakeOver($date, $index);
		return $week;
	}

}
