<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_results', function (Blueprint $table) {
            $table->increments('liveResultId');
            $table->integer('livePlanId')->unsigned();
            $table->integer('liveWorkId')->unsigned();
            $table->time('confTime');
            $table->timestamps();

            $table->foreign('livePlanId')
                    ->references('livePlanId')->on('live_plans')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('liveWorkId')
                    ->references('liveWorkId')->on('master_live_works')
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
        Schema::dropIfExists('live_results');
    }
}
