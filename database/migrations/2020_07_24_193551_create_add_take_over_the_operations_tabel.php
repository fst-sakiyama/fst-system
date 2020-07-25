<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTakeOverTheOperationsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_take_over_the_operations', function (Blueprint $table) {
            $table->increments('addTakeOverId');
            $table->integer('takeOverId')->unsigned();
            $table->text('addTakeOverContent');
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
        Schema::dropIfExists('add_take_over_the_operations');
    }
}
