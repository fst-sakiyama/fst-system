<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectCodeColumnMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('master_projects', function (Blueprint $table) {
        $table->unsignedInteger('projectCode')->length(3)
              ->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_projects', function (Blueprint $table) {
            $table->dropColumn('projectCode');
        });
    }
}