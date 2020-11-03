<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeOverFilePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_over_file_post', function (Blueprint $table) {
          $table->integer('takeOverId')->unsigned();
          $table->integer('addFilePostId')->unsigned();
          $table->primary(['takeOverId','addFilePostId']);

          $table->foreign('takeOverId')
                ->references('takeOverId')->on('take_over_the_operations')
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
        Schema::dropIfExists('take_over_file_post');
    }
}
