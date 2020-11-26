<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ViewWorkTable1;
use App\Models\ViewWorkTable2;
use App\Models\ViewShiftWorkLoad;
use App\Models\ViewTableWorkLoad;
use Illuminate\Support\Facades\DB;

class CreateViewComparisonWorkLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $res1 = ViewWorkTable1::whereNull('lateEarlyLeave')
                ->join('view_shift_work_loads','view_work_table1.shiftId','=','view_shift_work_loads.shiftId')
                ->join('view_table_work_loads','view_work_table1.shiftTableId','=','view_table_work_loads.shiftTableId')
                ->select('view_work_table1.shiftTableId','view_shift_work_loads.workLoad AS planWorkLoad','view_table_work_loads.workLoad AS realWorkLoad')
                ->toSql();
        $res2 = ViewWorkTable1::whereNotNull('lateEarlyLeave')
                ->join('view_table_work_loads','view_work_table1.shiftTableId','=','view_table_work_loads.shiftTableId')
                ->select('view_work_table1.shiftTableId','view_table_work_loads.workLoad AS planWorkLoad','view_table_work_loads.workLoad AS realWorkLoad')
                ->toSql();
        $res3 = ViewWorkTable2::join('view_shift_work_loads','view_work_table2.shiftId','=','view_shift_work_loads.shiftId')
                ->select('view_work_table2.shiftTableId','view_shift_work_loads.workLoad AS planWorkLoad','view_shift_work_loads.workLoad AS realWorkLoad')
                ->toSql();
        DB::connection('mysql_two')->statement("CREATE VIEW view_comparison_work_loads AS ($res1".' union all '."$res2".' union all '."$res3)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('mysql_two')->statement('DROP VIEW IF EXISTS view_comparison_work_loads');
    }
}
