<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterClientsTable extends Migration
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
            $table->string('clientNameKana')->nullable();
            $table->date('contractStartDate')->nullable();
            $table->date('contractEndDate')->nullable();
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
        Schema::dropIfExists('file_posts');
        Schema::dropIfExists('master_projects');
        Schema::dropIfExists('master_clients');
    }
}
