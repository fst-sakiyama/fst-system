<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('work_tables', function (Blueprint $table) {
          $table->bigIncrements('workTableId');
          $table->date('workTableWorkDay');
          $table->bigInteger('workTableUserId')->unsigned();
          $table->string('goingWorkHour',4)->nullable();
          $table->string('goingWorkMinute',4)->nullable();
          $table->string('leavingWorkHour',4)->nullable();
          $table->string('leavingWorkMinute',4)->nullable();
          $table->string('workTableRest1StartHour',4)->nullable();
          $table->string('workTableRest1StartMinute',4)->nullable();
          $table->string('workTableRest1EndHour',4)->nullable();
          $table->string('workTableRest1EndMinute',4)->nullable();
          $table->string('workTableRest2StartHour',4)->nullable();
          $table->string('workTableRest2StartMinute',4)->nullable();
          $table->string('workTableRest2EndHour',4)->nullable();
          $table->string('workTableRest2EndMinute',4)->nullable();
          $table->string('workTableRest3StartHour',4)->nullable();
          $table->string('workTableRest3StartMinute',4)->nullable();
          $table->string('workTableRest3EndHour',4)->nullable();
          $table->string('workTableRest3EndMinute',4)->nullable();
          $table->unsignedTinyInteger('lateEarlyLeave')->nullable();
          $table->string('specialReason',255)->nullable();
          $table->string('remarks',255)->nullable();
          $table->timestamps();

          $table->unique(['workTableWorkDay','workTableUserId']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_two')->dropIfExists('work_tables');
    }
}
