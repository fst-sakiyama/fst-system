<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnLastLoginAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_two')->table('users', function (Blueprint $table) {
            $table->timestamp('last_login_at')->nullable()->after('remember_token')->comment('最終ログイン');
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
            $table->dropColumn('last_login_at');
        });
    }
}
