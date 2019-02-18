<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('received_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mail_id');
            $table->binary('status');//0-unread, 1-read
            $table->timestamps();

            $table->foreign('mail_id')->references('id')->on('mails')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('received_mails');
    }
}
