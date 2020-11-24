<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ShiftTable;
use Illuminate\Support\Facades\DB;

class ViewWorkTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = ShiftTable::has('workTable')
                ->join('work_tables AS t1','shift_tables.shiftTableId','=','t1.shiftTableId')
                ->select('shift_tables.*','t1.startHour','t1.startMinute','t1.endHour','t1.endMinute','t1.rest1StartHour','t1.rest1StartMinute','t1.rest1EndHour','t1.rest1EndMinute','t1.rest2StartHour','t1.rest2StartMinute','t1.rest2EndHour','t1.rest2EndMinute','t1.rest3StartHour','t1.rest3StartMinute','t1.rest3EndHour','t1.rest3EndMinute','t1.lateEarlyLeave','t1.specialReason','t1.remarks')
                ->toSql();

        DB::connection('mysql_two')->statement("CREATE VIEW view_work_table1 AS ($sql)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_two')->statement('DROP VIEW IF EXISTS view_work_table1');
    }
}
