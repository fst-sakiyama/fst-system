<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTakeOverFilePostTable extends Migration
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
          $table->integer('filePostId')->unsigned();
          $table->primary(['addTakeOverId','filePostId']);

          $table->foreign('addTakeOverId')
                ->references('addTakeOverId')->on('add_take_over_the_operations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          $table->foreign('filePostId')
                ->references('filePostId')->on('file_posts')
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
      Schema::table('add_take_over_file_post', function (Blueprint $table) {
        $table->dropForeign('add_take_over_file_post_addTakeOverId_foreign');
        $table->dropForeign('add_take_over_file_post_filePostId_foreign');
      });
      Schema::dropIfExists('add_take_over_file_post');
    }
}
