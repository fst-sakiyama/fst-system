<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegLiveShowDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_live_show_details', function (Blueprint $table) {
            $table->increments('regLiveDetailId');
            $table->integer('regLiveId')->unsigned();
            $table->integer('weekDay')->unsigned();
            $table->string('startHour');
            $table->string('startMinute');
            $table->timestamps();

            $table->foreign('regLiveId')
                    ->references('regLiveId')->on('master_reg_live_shows')
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
        Schema::dropIfExists('reg_live_show_details');
    }
}
