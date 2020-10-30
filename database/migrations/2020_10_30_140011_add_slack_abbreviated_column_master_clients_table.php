<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlackAbbreviatedColumnMasterClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_clients', function (Blueprint $table) {
            $table->string('slack_abbreviated')->nullable();
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
            $table->dropColumn('slack_abbreviated');
        });
    }
}
