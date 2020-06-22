<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileclassificationFilePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_posts', function (Blueprint $table) {
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
        Schema::table('file_posts', function (Blueprint $table) {
            $table->dropForeign('file_posts_fileClassificationId_foreign');
        });
    }
}
