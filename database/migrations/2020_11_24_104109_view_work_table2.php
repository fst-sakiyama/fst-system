<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ShiftTable;
use Illuminate\Support\Facades\DB;

class ViewWorkTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = ShiftTable::doesntHave('workTable')
                ->join('master_shifts AS t2','shift_tables.shiftId','=','t2.shiftId')
                ->select('shift_tables.*','t2.startHour','t2.startMinute','t2.endHour','t2.endMinute','t2.rest1StartHour','t2.rest1StartMinute','t2.rest1EndHour','t2.rest1EndMinute','t2.rest2StartHour','t2.rest2StartMinute','t2.rest2EndHour','t2.rest2EndMinute','t2.rest3StartHour','t2.rest3StartMinute','t2.rest3EndHour','t2.rest3EndMinute',DB::raw('null AS `lateEarlyLeave`'),DB::raw('null AS `specialReason`'),DB::raw('null AS `remarks`'))
                ->toSql();

        DB::connection('mysql_two')->statement("CREATE VIEW view_work_table2 AS ($sql)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_two')->statement('DROP VIEW IF EXISTS view_work_table2');
    }
}
