<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_projects', function (Blueprint $table) {
          $table->string('slack_channel_name')->nullable();
          $table->integer('order_of_row')->nullable();
          $table->dropColumn('projectCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_projects', function (Blueprint $table) {
          $table->dropColumn('slack_channel_name');
          $table->dropColumn('order_of_row');
          $table->unsignedInteger('projectCode')->length(3)
                ->nullable()->unique();
        });
    }
}
