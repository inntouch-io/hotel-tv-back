<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIptvChannelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iptv_channel_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_id');

            $table->string('title');
            $table->enum('locale', ['uz', 'ru', 'en']);

            $table->foreign('channel_id')->references('id')->on('iptv_channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iptv_channel_infos');
    }
}
