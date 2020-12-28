<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegLiveResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_live_results', function (Blueprint $table) {
            $table->increments('regLiveResultId');
            $table->integer('regLivePlanId')->unsigned();
            $table->integer('liveWorkId')->unsigned();
            $table->time('confTime');
            $table->timestamps();

            $table->foreign('regLivePlanId')
                    ->references('regLivePlanId')->on('reg_live_plans')
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
        Schema::dropIfExists('reg_live_results');
    }
}
