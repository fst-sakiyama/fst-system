<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnMasterClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_clients', function (Blueprint $table) {
            $table->string('slack_prefix',3)->nullable();
            $table->integer('order_of_row')->nullable();
            $table->dropColumn(['clientCode','clientNameKana','contractStartDate','contractEndDate']);
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
            $table->dropColumn('slack_prefix');
            $table->dropColumn('order_of_row');
            $table->unsignedInteger('clientCode')->length(3)
                  ->nullable()->unique();
            $table->string('clientNameKana')->nullable();
            $table->date('contractStartDate')->nullable();
            $table->date('contractEndDate')->nullable();
        });
    }
}
