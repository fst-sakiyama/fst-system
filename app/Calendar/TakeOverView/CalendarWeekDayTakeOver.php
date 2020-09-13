<?php
namespace App\Calendar\TakeOverView;

use Carbon\Carbon;

use App\Calendar\CalendarWeekDay;
use App\Calendar\HolidaySetting;
// use App\Calendar\ExtraHoliday;

class CalendarWeekDayTakeOver extends CalendarWeekDay {

	// public $extraHoliday = null;

	/**
	 * @return
	 */
	function render(){
		// //selectの名前
		// $select_form_name = "extra_holiday[" . $this->carbon->format("Ymd") . "][date_flag]";
		// //コメントのinputの名前
		// $comment_form_name = "extra_holiday[" . $this->carbon->format("Ymd") . "][comment]";
		//
		// //定休日設定の値
		// $defaultValue = ($this->isHoliday) ? "休み" : "営業日";
		// //臨時休業が選択されているかどうか
		// $isSelectedExtraClose = ($this->extraHoliday && $this->extraHoliday->isClose()) ? 'selected' : '';
		// //臨時営業が選択されているかどうか
		// $isSelectedExtraOpen = ($this->extraHoliday && $this->extraHoliday->isOpen()) ? 'selected' : '';
		// //コメントの値
		// $comment = ($this->extraHoliday) ? $this->extraHoliday->comment : '';

		//HTMLの組み立て
		$html = [];

		$html[] = '<p class="day">テスト</p>';

		//日付
		// $html[] = '<p class="day">' . $this->carbon->format("j"). '</p>';
		//臨時営業・臨時休業設定
		// $html[] = '<select name="'. $select_form_name . '" class="form-control">';
		// $html[] = '<option value="0">- (' . $defaultValue . ')</option>';
		// $html[] = '<option value="'.ExtraHoliday::CLOSE.'" ' . $isSelectedExtraClose . '>臨時休業</option>';
		// $html[] = '<option value="'.ExtraHoliday::OPEN.'" ' . $isSelectedExtraOpen . '>臨時営業</option>';
		// $html[] = '</select>';
		//コメント
		// if($isSelectedExtraClose || $isSelectedExtraOpen){
		// 	$html[] = '<input class="form-control" type="text" name="'.$comment_form_name.'" value="'.e($comment).'" />';
		// }

		return implode("", $html);
	}

	// function getClassName(){
	// 	$classNames = [ "day-" . strtolower($this->carbon->format("D")) ];
	// 	if($this->extraHoliday){
	// 		if($this->extraHoliday->isClose()){
	// 			$classNames[] = "day-close"; //臨時営業
	// 		}
	// 	}else if($this->isHoliday){
	//
	// 		$classNames[] = "day-close";
	// 	}
	// 	return implode(" ", $classNames);
	// }
}
