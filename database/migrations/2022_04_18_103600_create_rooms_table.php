<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->index();
            
            $table->string('room_number')->nullable()->unique();
            $table->unsignedSmallInteger('max_volume')->default(50);
            $table->enum('room_status', ['free', 'booked'])->default('free');
            $table->tinyInteger('is_active')->default(0);

            $table->string('device_id');
            $table->string('device_ip')->nullable();

            $table->foreign('category_id')->references('id')->on('room_categories');
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
        Schema::dropIfExists('rooms');
    }
}
