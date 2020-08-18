<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeOverReferenceLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_over_reference_link', function (Blueprint $table) {
          $table->integer('takeOverId')->unsigned();
          $table->integer('linkId')->unsigned();
          $table->primary(['takeOverId','linkId']);

          $table->foreign('takeOverId')
                ->references('takeOverId')->on('take_over_the_operations')
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
        Schema::table('take_over_reference_link', function (Blueprint $table) {
          $table->dropForeign('take_over_reference_link_takeOverId_foreign');
          $table->dropForeign('take_over_reference_link_linkId_foreign');
        });
        Schema::dropIfExists('take_over_reference_link');
    }
}
