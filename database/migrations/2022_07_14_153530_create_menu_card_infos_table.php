<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCardInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_card_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->index();

            $table->string('title');
            $table->string('description');
            $table->text('subDescription');
            $table->string('locale', 8)->default('ru');

            $table->foreign('card_id')->references('id')->on('menu_cards');
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
        Schema::dropIfExists('menu_card_infos');
    }
}
