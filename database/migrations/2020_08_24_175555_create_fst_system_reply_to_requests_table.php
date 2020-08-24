<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFstSystemReplyToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_three')->create('fst_system_reply_to_requests', function (Blueprint $table) {
            $table->increments('fstSystemReplyToRequestId');
            $table->integer('fstSystemRequestPlateId')->unsigned();
            $table->text('reply');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fstSystemRequestPlateId')
                  ->references('fstSystemRequestPlateId')->on('fst_system_request_plates')
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
        Schema::connection('mysql_three')->dropIfExists('fst_system_reply_to_requests');
    }
}
