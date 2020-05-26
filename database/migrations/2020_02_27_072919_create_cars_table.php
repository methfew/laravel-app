<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('brand', 30);
            $table->string('model', 30);
            $table->float('price', 8, 2);
            $table->string('car_body_style', 30);
            $table->integer('number_of_doors');
            $table->integer('number_of_seats');
            $table->string('color', 30);
            $table->year('year_of_manufacture');
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
        Schema::dropIfExists('cars');
    }
}
