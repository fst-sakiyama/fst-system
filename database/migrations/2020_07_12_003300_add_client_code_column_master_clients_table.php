<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientCodeColumnMasterClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_clients', function (Blueprint $table) {
          $table->unsignedInteger('clientCode')->length(3)
                ->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_clients', function (Blueprint $table) {
          $table->dropColumn('clientCode');
        });
    }
}
