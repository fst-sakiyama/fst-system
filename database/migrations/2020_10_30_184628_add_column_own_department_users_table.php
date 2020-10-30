<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOwnDepartmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->table('users', function (Blueprint $table) {
            $table->integer('own_department')->unsigned()->nullable();

            $table->foreign('own_department')
                  ->references('workingTeamId')->on('profitable_material.master_working_teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_two')->table('users', function (Blueprint $table) {
            $table->dropForeign('users_own_department_foreign');
            $table->dropColumn('own_department');
        });
    }
}
