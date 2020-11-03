<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterShifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('master_shifts', function (Blueprint $table) {
          $table->increments('shiftId');
          $table->string('shiftName');
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
          $table->string('workLocation')->nullable();
          $table->string('workStyle')->nullable();
          $table->text('description')->nullable();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_two')->dropIfExists('master_shifts');
    }
}
