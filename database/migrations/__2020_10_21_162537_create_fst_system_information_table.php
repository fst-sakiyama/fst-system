<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFstSystemInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_three')->create('fst_system_information', function (Blueprint $table) {
            $table->id();
            $table->integer('classification')->unsigned();
            $table->text('information');
            $table->string('fileName')->nullable();
            $table->string('fileUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_three')->dropIfExists('fst_system_information');
    }
}
