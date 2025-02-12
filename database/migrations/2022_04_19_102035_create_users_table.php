<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id')->index()->nullable();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone_number')->unique();
            $table->string('passport_number')->unique();
            $table->enum('language', ['uz', 'ru', 'en']);
            $table->unsignedBigInteger('arrival_time')->nullable();
            $table->unsignedBigInteger('departure_time')->nullable();

            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('users');
    }
}
