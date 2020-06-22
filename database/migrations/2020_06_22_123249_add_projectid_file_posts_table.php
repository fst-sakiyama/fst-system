<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectidFilePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_posts', function (Blueprint $table) {
          $table->foreign('projectId')
                  ->references('projectId')->on('master_projects')
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
        Schema::table('file_posts', function (Blueprint $table) {
            $table->dropForeign('file_posts_projectId_foreign');
        });
    }
}
