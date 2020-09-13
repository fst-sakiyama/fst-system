<?php
namespace App\Calendar\TakeOverView;

use Carbon\Carbon;
use App\Calendar\CalendarWeek;
use App\Calendar\HolidaySetting;

class CalendarWeekTakeOver extends CalendarWeek {
	/**
	 * @return CalendarWeekDayTakeOver
	 */
	function getDay(Carbon $date, HolidaySetting $setting){
		$day = new CalendarWeekDayTakeOver($date);
		$day->checkHoliday($setting);
		return $day;
	}
}
