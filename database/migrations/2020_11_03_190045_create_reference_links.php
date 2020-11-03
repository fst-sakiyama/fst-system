<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_links', function (Blueprint $table) {
          $table->increments('linkId');
          $table->string('referenceLinkURL');
          $table->string('remarks')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_links');
    }
}
