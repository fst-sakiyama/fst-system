<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->unsigned()->default(10)->index('index_role');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['email', 'deleted_at'], 'users_email_deleted_at_unique');

            $table->foreign('role')
                  ->references('role')->on('master_roles')
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