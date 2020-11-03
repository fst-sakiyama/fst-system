<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_clients', function (Blueprint $table) {
          $table->increments('clientId');
          $table->string('clientName');
          $table->string('slack_prefix',3)->nullable();
          $table->string('slack_abbreviated')->nullable();
          $table->integer('order_of_row')->nullable();
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
        Schema::dropIfExists('master_clients');
    }
}
