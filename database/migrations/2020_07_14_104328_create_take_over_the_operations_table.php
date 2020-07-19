<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeOverTheOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_over_the_operations', function (Blueprint $table) {
            $table->increments('takeOverId');
            $table->integer('projectId')->unsigned();
            $table->text('takeOverContent');
            $table->date('timeLimit')->nullable();
            $table->date('wellKnown')->nullable();
            $table->timestamp('doComp')->nullable();
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
        Schema::dropIfExists('take_over_the_operations');
    }
}
