<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIptvChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iptv_channels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');

            $table->string('slug')->unique();
            $table->string('title');
            $table->string('stream_url');
            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedBigInteger('order_position')->default(0);

            $table->foreign('image_id')->references('id')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iptv_channels');
    }
}
