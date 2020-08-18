<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTakeOverReferenceLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_take_over_reference_link', function (Blueprint $table) {
          $table->integer('addTakeOverId')->unsigned();
          $table->integer('linkId')->unsigned();
          $table->primary(['addTakeOverId','linkId']);

          $table->foreign('addTakeOverId')
                ->references('addTakeOverId')->on('add_take_over_the_operations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          $table->foreign('linkId')
                ->references('linkId')->on('reference_links')
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
        Schema::table('add_take_over_reference_link', function (Blueprint $table) {
          $table->dropForeign('add_take_over_reference_link_addTakeOverId_foreign');
          $table->dropForeign('add_take_over_reference_link_linkId_foreign');
        });
        Schema::dropIfExists('add_take_over_reference_link');
    }
}
