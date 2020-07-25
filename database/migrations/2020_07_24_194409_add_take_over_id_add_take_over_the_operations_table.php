<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTakeOverIdAddTakeOverTheOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_take_over_the_operations', function (Blueprint $table) {
          $table->foreign('takeOverId')
                ->references('takeOverId')->on('take_over_the_operations')
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
        Schema::table('add_take_over_the_operations', function (Blueprint $table) {
            $table->dropForeign('add_take_over_the_operations_takeOverId_foreign');
        });
    }
}
