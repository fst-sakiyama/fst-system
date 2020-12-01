<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveMonitaringPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_monitaring_plans', function (Blueprint $table) {
            $table->bigIncrements('liveMonitaringPlanId');
            $table->unsignedTinyInteger('dvr')->default(0);
            $table->integer('issueNo')->unsigned()->nullable();
            $table->date('eventDay');
            $table->string('startHour',2)->nullable();
            $table->string('startMinute',2)->nullable();
            $table->string('endHour',2)->nullable();
            $table->string('endMinute',2)->nullable();
            $table->string('liveName');
            $table->text('specialNote')->nullable();
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
        Schema::dropIfExists('live_monitaring_plans');
    }
}
