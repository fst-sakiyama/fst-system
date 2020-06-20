<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_projects', function (Blueprint $table) {
            $table->increments('projectId');
            $table->integer('clientId')->unsigned();
            $table->integer('contractTypeId')->unsigned();
            $table->string('projectName');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_projects');
    }
}
