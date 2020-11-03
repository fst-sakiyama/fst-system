<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('master_roles', function (Blueprint $table) {
          $table->tinyInteger('role')->unsigned();
          $table->string('roleName')->nullable();
          $table->timestamps();

          $table->unique('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_two')->dropIfExists('master_roles');
    }
}
