<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ShiftTable;
use Illuminate\Support\Facades\DB;

class CreateViewWorkTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $res = ShiftTable::has('workTable')
              ->join('work_tables AS t','shift_tables.shiftTableId','=','t.shiftTableId')
              ->select('shift_tables.*','t.startHour','t.startMinute','t.endHour','t.endMinute','t.rest1StartHour','t.rest1StartMinute','t.rest1EndHour','t.rest1EndMinute','t.rest2StartHour','t.rest2StartMinute','t.rest2EndHour','t.rest2EndMinute','t.rest3StartHour','t.rest3StartMinute','t.rest3EndHour','t.rest3EndMinute','t.lateEarlyLeave','t.specialReason','remarks');
      $sql = ShiftTable::doesntHave('workTable')
              ->join('master_shifts AS t','shift_tables.shiftId','=','t.shiftId')
              ->select('shift_tables.*','t.startHour','t.startMinute','t.endHour','t.endMinute','t.rest1StartHour','t.rest1StartMinute','t.rest1EndHour','t.rest1EndMinute','t.rest2StartHour','t.rest2StartMinute','t.rest2EndHour','t.rest2EndMinute','t.rest3StartHour','t.rest3StartMinute','t.rest3EndHour','t.rest3EndMinute',DB::raw('null AS lateEarlyLeave'),DB::raw('null AS specialReason'),DB::raw('null AS remarks'))
              ->union($res)->toSql();
      DB::connection('mysql_two')->statement("CREATE VIEW view_work_tables AS ($sql)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::connection('mysql_two')->statement('DROP VIEW IF EXISTS view_work_tables');
    }
}
