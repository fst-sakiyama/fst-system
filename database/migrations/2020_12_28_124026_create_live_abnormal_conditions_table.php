<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveAbnormalConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_abnormal_conditions', function (Blueprint $table) {
            $table->increments('liveAbnormalConditionId');
            $table->integer('livePlanId')->unsigned();
            $table->time('confTime');
            $table->string('stateContent');
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
        Schema::dropIfExists('live_abnormal_conditions');
    }
}
