<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->create('users', function (Blueprint $table) {
          $table->id();
          $table->integer('own_department')->unsigned()->nullable();
          $table->string('name');
          $table->string('email');
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->tinyInteger('role')->unsigned()->default(20)->index('index_role');
          $table->rememberToken();
          $table->timestamp('last_login_at')->nullable()->comment('最終ログイン');
          $table->integer('order_of_row')->nullable();
          $table->unsignedTinyInteger('display_shift')->nullable();
          $table->timestamps();
          $table->softDeletes();
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
          $table->integer('deleted_by')->unsigned()->nullable();
          $table->integer('restored_by')->unsigned()->nullable();

          $table->unique(['email', 'deleted_at'], 'users_email_deleted_at_unique');

          $table->foreign('role')
                ->references('role')->on('master_roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

          $table->foreign('own_department')
                ->references('workingTeamId')->on('master_working_teams')
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
        Schema::connection('mysql_two')->dropIfExists('users');
    }
}
