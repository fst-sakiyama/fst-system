<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('paid_leaves', function (Blueprint $table) {
            $table->increments('paidLeaveId');
            $table->bigInteger('userId')->unsigned();
            $table->unsignedTinyInteger('dispPaidLeave')->default(0);
            $table->date('grantDate')->nullable();
            $table->timestamps();

            $table->foreign('userId')
                    ->references('id')->on('users')
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
        Schema::connection('mysql_two')->dropIfExists('paid_leaves');
    }
}
