<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id')->index();
            $table->unsignedBigInteger('image_id')->index();

            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedBigInteger('order_position')->default(0);

            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('image_id')->references('id')->on('images');

            $table->softDeletes();
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
        Schema::dropIfExists('message_cards');
    }
}
