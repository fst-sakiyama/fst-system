<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_projects', function (Blueprint $table) {
          $table->increments('projectId');
          $table->integer('clientId')->unsigned();
          $table->integer('contractTypeId')->unsigned();
          $table->integer('workingTeamId')->unsigned();
          $table->string('projectName');
          $table->date('startDate')->nullable();
          $table->date('endDate')->nullable();
          $table->string('slack_channel_name')->nullable();
          $table->integer('order_of_row')->nullable();
          $table->text('project_detail')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();

          $table->foreign('clientId')
                  ->references('clientId')->on('master_clients')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

          $table->foreign('contractTypeId')
                  ->references('contractTypeId')->on('master_contract_types')
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
        Schema::dropIfExists('master_projects');
    }
}
