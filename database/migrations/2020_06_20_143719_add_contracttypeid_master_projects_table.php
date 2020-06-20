<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContracttypeidMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_projects', function (Blueprint $table) {
          $table->foreign('contractTypeId')
                  ->references('contractTypeId')->on('master_contract_types')
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
        Schema::table('master_projects', function (Blueprint $table) {
            $table->dropForeign('master_projects_contractTypeId_foreign');
        });
    }
}
