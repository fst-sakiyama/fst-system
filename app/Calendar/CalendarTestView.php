<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Models\TakeOverTheOperation;

class CalendarTestView extends CalendarView
{

  	/**
  	 * カレンダーを出力する
  	 */
  	function render(){

			$setting = new HolidaySetting();
			$setting->loadHoliday($this->carbon->format("Y"));

  		$html = [];
  		// $html[] = '<div class="calendar">';
  		// $html[] = '<table class="table">';
  		// $html[] = '<thead>';
  		// $html[] = '<tr>';
  		// $html[] = '<th>月</th>';
  		// $html[] = '<th>火</th>';
  		// $html[] = '<th>水</th>';
  		// $html[] = '<th>木</th>';
  		// $html[] = '<th>金</th>';
  		// $html[] = '<th>土</th>';
      // $html[] = '<th>日</th>';
  		// $html[] = '</tr>';
  		// $html[] = '</thead>';


      // $html[] = '<tbody>';

      $weeks = $this->getWeeks();
      foreach($weeks as $week){
      	$html[] = '<tr class="'.$week->getClassName().'">';
      	$days = $week->getDays($setting);
      	foreach($days as $day){
          // dump(TakeOverTheOperation::whereDate('created_at','=',$day)->count());
      		$html[] = '<td class="'.$day->getClassName().'">';
      		$html[] = $day->render();
          // $html[] = $cnt;
      		$html[] = '</td>';
      	}
      	$html[] = '</tr>';
      }
      // $html[] = '</tbody>';
      //
      //
  		// $html[] = '</table>';
  		// $html[] = '</div>';
  		return implode("", $html);
  	}

    function take_over_count($day)
    {
      return TakeOverTheOperation::whereDate('created_at','=',$day)->count();
    }

}
