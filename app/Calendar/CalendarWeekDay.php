<?php
namespace App\Calendar;
use Carbon\Carbon;

class CalendarWeekDay {
	protected $carbon;
	protected $isHoliday = false;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	function getClassName(){
		$classNames = [ "day-" . strtolower($this->carbon->format("D")) ];

		//祝日フラグを出す
		if($this->isHoliday){
			$classNames[] = "day-holiday";
		}

		return implode(" ", $classNames);
	}

	// function getClassName(){
	// 	return "day-" . strtolower($this->carbon->format("D"));
	// }

	/**
	 * @return
	 */
	function render(){
			return '<p class="day">' . $this->carbon->format("j"). '中身</p>';
	}

	function checkHoliday(HolidaySetting $setting){
			//祝日は曜日とは別に判定する
			if($setting->isHoliday($this->carbon)){
				$this->isHoliday = true;
			}
	}

	function getDateKey(){
			return $this->carbon->format("Ymd");
	}

	function setHoliday($flag){
			$this->isHoliday = $flag;
	}

}
