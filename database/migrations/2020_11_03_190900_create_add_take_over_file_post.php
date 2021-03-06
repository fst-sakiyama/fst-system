<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTakeOverFilePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_take_over_file_post', function (Blueprint $table) {
          $table->integer('addTakeOverId')->unsigned();
          $table->integer('addFilePostId')->unsigned();
          $table->primary(['addTakeOverId','addFilePostId']);

          $table->foreign('addTakeOverId')
                ->references('addTakeOverId')->on('add_take_over_the_operations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          $table->foreign('addFilePostId')
                ->references('addFilePostId')->on('add_file_posts')
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
        Schema::dropIfExists('add_take_over_file_post');
    }
}
