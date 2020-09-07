<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LocalFstSystemProgressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_three')->create('fst_system_progress_details', function (Blueprint $table) {
          $table->increments('fstSystemProgressDetailId');
          $table->integer('fstSystemProgressId')->unsigned();
          $table->text('fstSystemPlanDetail');
          $table->timestamp('doComp')->nullable();
          $table->timestamps();

          $table->foreign('fstSystemProgressId')
                  ->references('fstSystemProgressId')->on('fst_system_progress')
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
        Schema::connection('mysql_three')->dropIfExists('fst_system_progress_details');
    }
}
