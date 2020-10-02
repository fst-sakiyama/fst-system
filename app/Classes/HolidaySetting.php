<?php

namespace App\Classes;

use Yasumi\Yasumi;
use Carbon\Carbon;

class HolidaySetting {

    private $holidays = null;
    public $jpHolidays = [];

    function loadHoliday($year){
      $this->holidays = Yasumi::create("Japan", $year,"ja_JP");

      if($this->holidays){
          foreach($this->holidays as $holiday){
              $date = new Carbon($holiday); // 日付形式を指定
              $jpName = $holiday->getName(); // 祝日名称を取得
              // 「振替休日（成人の日）」という形式で文字列が入っているので、「（休日名）」を削除しておきます。
              $jpName = preg_replace('/^振替休日 \(([^\)]+)\)/', '${1}', $jpName);
              $this->jpHolidays += array($date->timestamp=>$jpName); // 日付文字列をキーに連想配列
          }
      }
    }

    function isHoliday($date){
      if(!$this->holidays)return false;
      return $this->holidays->isHoliday($date);
    }

}
