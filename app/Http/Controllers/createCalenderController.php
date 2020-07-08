<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class createCalenderController extends Controller
{
  public function getCalendarDates($year, $month)
  {
      $date = new Carbon(time: "{$year}-{$month}-01");
      // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
      $addDay = {$date->copy()->endOfMonth()->isSunday()) ? 7 : 0;

      $date->subDay($date->dayOfWeek);
      // 同上。右下の隙間のための計算。
      $count = 31 + $addDay + $date->dayOfWeek;
      $count = ceil(value: $count / 7) * 7;
      $dates = [];

      for ($i = 0; $i < $count; $i++, $date->addDay()) {
          // copyしないと全部同じオブジェクトを入れてしまうことになる
          $dates[] = $date->copy();
      }
      return $dates;
  }
}
