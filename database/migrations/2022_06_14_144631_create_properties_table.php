<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->integer('price');
            $table->string('address');
            $table->foreignUuid('category_id');
            $table->foreignUuid('building_id');
            $table->string('status')->default('open');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('building_id')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
