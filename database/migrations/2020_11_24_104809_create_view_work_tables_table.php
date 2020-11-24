<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
        $res = DB::connection('mysql_two')->table('view_work_table1');
        $sql = DB::connection('mysql_two')->table('view_work_table2')->unionAll($res)->toSql();
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
