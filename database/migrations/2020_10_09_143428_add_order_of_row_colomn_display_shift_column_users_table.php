<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderOfRowColomnDisplayShiftColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->table('users', function (Blueprint $table) {
          $table->integer('order_of_row')->nullable();
          $table->unsignedTinyInteger('display_shift')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_two')->table('users', function (Blueprint $table) {
            $table->dropColumn('order_of_row');
            $table->dropColumn('display_shift');
        });
    }
}
