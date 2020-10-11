<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserByConnectOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('take_over_the_operations', function (Blueprint $table) {
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('add_take_over_the_operations', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('add_file_posts', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('file_posts', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('reference_links', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('master_clients', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });

      Schema::table('master_projects', function (Blueprint $table) {
        $table->integer('created_by')->unsigned()->nullable();
        $table->integer('updated_by')->unsigned()->nullable();
        $table->integer('deleted_by')->unsigned()->nullable();
        $table->integer('restored_by')->unsigned()->nullable();
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('take_over_the_operations', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('add_take_over_the_operations', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('add_file_posts', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('file_posts', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('reference_links', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('master_clients', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });

      Schema::table('master_projects', function (Blueprint $table) {
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
        $table->dropColumn('deleted_by');
        $table->dropColumn('restored_by');
      });


    }
}
