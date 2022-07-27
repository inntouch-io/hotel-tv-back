<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id')->index();

            $table->enum('type', ['aboutMenu', 'serviceMenu', 'whereToGo']);
            $table->enum('category', ['place', 'service']);
            $table->unsignedTinyInteger('is_visible')->default(0);
            $table->unsignedBigInteger('order_position')->default(0);

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
        Schema::dropIfExists('menus');
    }
}
