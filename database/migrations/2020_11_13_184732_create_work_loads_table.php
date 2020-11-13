<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('work_loads', function (Blueprint $table) {
          $table->bigIncrements('workLoadId');
          $table->bigInteger('shiftTableId')->unsigned();
          $table->integer('teamProjectId')->unsigned();
          $table->integer('workLoad')->unsigned();
          $table->string('memo');
          $table->timestamps();

          $table->foreign('shiftTableId')
                ->references('shiftTableId')->on('shift_tables')
                ->onDelete('cascade')
                ->onUpdate('cascade');

          $table->foreign('teamProjectId')
                ->references('teamProjectId')->on('profitable_material.team_projects')
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
        Schema::dropIfExists('work_loads');
    }
}
