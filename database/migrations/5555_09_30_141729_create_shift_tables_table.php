<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('shift_tables', function (Blueprint $table) {
            $table->bigIncrements('shiftTableId');
            $table->date('workDay');
            $table->bigInteger('userId')->unsigned();
            $table->integer('shiftId')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['workDay','userId']);

            $table->foreign('userId')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('shiftId')
                  ->references('shiftId')->on('master_shifts')
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
        Schema::connection('mysql_two')->dropIfExists('shift_tables');
    }
}
