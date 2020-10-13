<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTablesTable extends Migration
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
            // $table->integer('shiftId')->unsigned();
            $table->string('goingWorkHour',2)->nullable();
            $table->string('goingWorkMinute',2)->nullable();
            $table->string('leavingWorkHour',2)->nullable();
            $table->string('leavingWorkMinute',2)->nullable();
            $table->string('workTableRest1StartHour',2)->nullable();
            $table->string('workTableRest1StartMinute',2)->nullable();
            $table->string('workTableRest1EndHour',2)->nullable();
            $table->string('workTableRest1EndMinute',2)->nullable();
            $table->string('workTableRest2StartHour',2)->nullable();
            $table->string('workTableRest2StartMinute',2)->nullable();
            $table->string('workTableRest2EndHour',2)->nullable();
            $table->string('workTableRest2EndMinute',2)->nullable();
            $table->string('workTableRest3StartHour',2)->nullable();
            $table->string('workTableRest3StartMinute',2)->nullable();
            $table->string('workTableRest3EndHour',2)->nullable();
            $table->string('workTableRest3EndMinute',2)->nullable();
            $table->unsignedTinyInteger('lateEarlyLeave')->nullable();
            $table->string('specialReason',255)->nullable();
            $table->string('remarks',255)->nullable();
            $table->timestamps();

            $table->unique(['workTableWorkDay','workTableUserId']);

            // $table->foreign('shiftId')
            //       ->references('shiftId')->on('master_shifts')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');

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
