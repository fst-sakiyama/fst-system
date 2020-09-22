<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Calendar
{

  function weekday()
  {
      return ['日', '月', '火', '水', '木', '金', '土'];
  }

  function getCalendarDates($year,$month)
  {
    // 年月の指定がないときは、現在の年月でカレンダーを作成する
    if(empty($year) || empty($month)){
      $year = date("Y");
      $month = date("m");
    }

    $date = new Carbon("{$year}-{$month}-01");
    // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
    // $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;
    $addDay = 6 - $date->copy()->endOfMonth()->dayOfWeek;
    // dump($date->copy()->endOfMonth());

    $date->subDay($date->dayOfWeek);
    // dump($date);
    // 同上。右下の隙間のための計算。
    $count = 31 + $addDay + $date->dayOfWeek;
    // dump($addDay.':'.$date->dayOfWeek);

    $count = ceil($count / 7) * 7;
    $dates = [];

    for ($i = 0; $i < $count; $i++, $date->addDay()) {
        // copyしないと全部同じオブジェクトを入れてしまうことになる
        $dates[] = $date->copy();
    }
    return $dates;
  }
}
