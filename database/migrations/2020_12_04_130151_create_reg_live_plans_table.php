<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegLivePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_live_plans', function (Blueprint $table) {
            $table->increments('regLivePlanId');
            $table->integer('classification')->unsigned();
            $table->date('eventDay');
            $table->integer('regLiveDetailId')->unsigned();
            $table->unsignedTinyInteger('exe')->default(1);
            $table->timestamps();

            $table->foreign('regLiveDetailId')
                    ->references('regLiveDetailId')->on('reg_live_show_details')
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
        Schema::dropIfExists('reg_live_plans');
    }
}
