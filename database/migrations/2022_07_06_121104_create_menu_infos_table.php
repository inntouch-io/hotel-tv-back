<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->index();

            $table->string('title');
            $table->string('locale', 8)->default('ru');

            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('menu_infos');
    }
}
