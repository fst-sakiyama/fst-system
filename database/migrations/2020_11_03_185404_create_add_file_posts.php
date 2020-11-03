<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFilePosts extends Migration
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
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();

          $table->foreign('projectId')
                  ->references('projectId')->on('master_projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

          $table->foreign('fileClassificationId')
                  ->references('fileClassificationId')->on('master_file_classifications')
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
        Schema::dropIfExists('add_file_posts');
    }
}
