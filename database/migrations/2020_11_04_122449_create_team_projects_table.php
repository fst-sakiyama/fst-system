<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_projects', function (Blueprint $table) {
            $table->increments('teamProjectId');
            $table->integer('projectId')->unsigned();
            $table->integer('workingTeamId')->unsigned();
            $table->string('slack_channel_name')->nullable();
            $table->text('project_detail')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('restored_by')->unsigned()->nullable();

            $table->foreign('projectId')
                  ->references('projectId')->on('master_projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('workingTeamId')
                  ->references('workingTeamId')->on('company_data.master_working_teams')
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
        Schema::dropIfExists('team_projects');
    }
}
