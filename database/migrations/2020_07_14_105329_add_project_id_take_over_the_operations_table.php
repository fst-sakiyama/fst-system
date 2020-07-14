<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdTakeOverTheOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('take_over_the_operations', function (Blueprint $table) {
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
        Schema::table('take_over_the_operations', function (Blueprint $table) {
          $table->dropForeign('take_over_the_operations_projectId_foreign');
        });
    }
}
