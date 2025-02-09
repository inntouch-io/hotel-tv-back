<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIptvCountryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iptv_country_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');

            $table->string('title');
            $table->enum('locale', ['uz', 'ru', 'en']);

            $table->foreign('country_id')->references('id')->on('iptv_countries');
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
        Schema::dropIfExists('iptv_country_infos');
    }
}
