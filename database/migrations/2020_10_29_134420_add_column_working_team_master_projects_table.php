<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnWorkingTeamMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_projects', function (Blueprint $table) {
            $table->integer('workingTeamId')->unsigned();

            $table->foreign('workingTeamId')
                  ->references('workingTeamId')->on('master_working_teams')
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
        Schema::table('master_projects', function (Blueprint $table) {
            $table->dropForeign('master_projects_workingTeamId_foreign');
            $table->dropColumn('workingTeamId');
        });
    }
}
