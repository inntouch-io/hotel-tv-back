<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id')->index();

            $table->string('title');
            $table->string('description');
            $table->string('longDescription');
            $table->string('locale', 8)->default('ru');

            $table->foreign('message_id')->references('id')->on('messages');
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
        Schema::dropIfExists('message_infos');
    }
}
