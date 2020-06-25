<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_posts', function (Blueprint $table) {
          $table->increments('filePostId');
          $table->integer('projectId')->unsigned();
          $table->integer('fileClassificationId')->unsigned();
          $table->string('fileName');
          $table->string('fileURL');
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
        Schema::dropIfExists('file_posts');
    }
}
