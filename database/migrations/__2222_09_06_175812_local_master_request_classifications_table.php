<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LocalMasterRequestClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mysql_three')->create('master_request_classifications', function (Blueprint $table) {
        $table->increments('requestClassificationId');
        $table->string('requestClassification');
        $table->string('requestColorClass');
        $table->string('requestImage');
        $table->string('explanation');
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::connection('mysql_three')->dropIfExists('master_request_classifications');
    }
}
