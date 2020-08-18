<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFilePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_file_posts', function (Blueprint $table) {
          $table->increments('addFilePostId');
          $table->integer('projectId')->unsigned()->default(0);
          $table->integer('fileClassificationId')->unsigned()->default(0);
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
        Schema::dropIfExists('add_file_posts');
    }
}
