<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->index();
            $table->unsignedBigInteger('image_id')->index();

            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedBigInteger('order_position')->default(0);

            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('menu_cards');
    }
}
