<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id')->index();

            $table->string('name');
            $table->string('locale', 8)->default('ru');

            $table->foreign('module_id')->references('id')->on('modules');
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
        Schema::dropIfExists('module_infos');
    }
}
