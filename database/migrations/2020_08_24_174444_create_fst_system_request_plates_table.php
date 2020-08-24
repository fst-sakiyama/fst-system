<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFstSystemRequestPlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_three')->create('fst_system_request_plates', function (Blueprint $table) {
            $table->increments('fstSystemRequestPlateId');
            $table->integer('requestClassificationId')->unsigned();
            $table->text('request');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('requestClassificationId')
                  ->references('requestClassificationId')->on('master_request_classifications')
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
        Schema::connection('mysql_three')->table('fst_system_reply_to_requests', function (Blueprint $table) {
          $table->dropForeign('master_request_classifications_requestClassificationId_foreign');
          $table->dropForeign('fst_system_reply_to_requests_fstSystemRequestPlateId_foreign');
        });
        Schema::connection('mysql_three')->dropIfExists('fst_system_request_plates');
    }
}
