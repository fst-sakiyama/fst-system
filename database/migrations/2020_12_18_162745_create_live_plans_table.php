<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_plans', function (Blueprint $table) {
            $table->increments('livePlanId');
            $table->unsignedTinyInteger('dvr')->default(0);
            $table->integer('issueNo')->unsigned();
            $table->date('eventDay');
            $table->string('startHour');
            $table->string('startMinute');
            $table->string('endHour')->nullable();
            $table->string('endMinute')->nullable();
            $table->string('liveName');
            $table->text('specialNote')->nullable();
            $table->unsignedTinyInteger('exe')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_plans');
    }
}
