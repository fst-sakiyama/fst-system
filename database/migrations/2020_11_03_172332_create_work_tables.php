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
          $table->bigInteger('shiftTableId')->unsigned();
          $table->string('startHour',2)->nullable();
          $table->string('startMinute',2)->nullable();
          $table->string('endHour',2)->nullable();
          $table->string('endMinute',2)->nullable();
          $table->string('rest1StartHour',2)->nullable();
          $table->string('rest1StartMinute',2)->nullable();
          $table->string('rest1EndHour',2)->nullable();
          $table->string('rest1EndMinute',2)->nullable();
          $table->string('rest2StartHour',2)->nullable();
          $table->string('rest2StartMinute',2)->nullable();
          $table->string('rest2EndHour',2)->nullable();
          $table->string('rest2EndMinute',2)->nullable();
          $table->string('rest3StartHour',2)->nullable();
          $table->string('rest3StartMinute',2)->nullable();
          $table->string('rest3EndHour',2)->nullable();
          $table->string('rest3EndMinute',2)->nullable();
          $table->unsignedTinyInteger('lateEarlyLeave')->nullable();
          $table->string('specialReason',255)->nullable();
          $table->string('remarks',255)->nullable();
          $table->timestamps();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();

          $table->foreign('shiftTableId')
                ->references('shiftTableId')->on('shift_tables')
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
        Schema::connection('mysql_two')->dropIfExists('work_tables');
    }
}
