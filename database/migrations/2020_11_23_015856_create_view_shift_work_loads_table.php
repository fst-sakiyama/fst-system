<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MasterShift;
use Illuminate\Support\Facades\DB;

class CreateViewShiftWorkLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $sql = MasterShift::selectRaw('shiftId,
                        ifnull(endHour,0)*60+ifnull(endMinute,0)
                        -ifnull(startHour,0)*60+ifnull(startMinute,0)
                        -(ifnull(rest1EndHour,0)*60+ifnull(rest1EndMinute,0)
                          -ifnull(rest1StartHour,0)*60+ifnull(rest1StartMinute,0))
                        -(ifnull(rest2EndHour,0)*60+ifnull(rest2EndMinute,0)
                          -ifnull(rest2StartHour,0)*60+ifnull(rest2StartMinute,0))
                        -(ifnull(rest3EndHour,0)*60+ifnull(rest3EndMinute,0)
                          -ifnull(rest3StartHour,0)*60+ifnull(rest3StartMinute,0)) AS workLoad')
                        ->toSql();
      DB::connection('mysql_two')->statement("CREATE VIEW view_shift_work_loads AS ($sql)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_two')->statement('DROP VIEW IF EXISTS view_shift_work_loads');
    }
}
