<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WeatherCreateTableUserWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather.user_weather', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('city_name');
            $table->integer('city_id');
            $table->decimal('longitude', 9, 2);
            $table->decimal('latitude', 9, 2);
            $table->decimal('temp', 9, 2);
            $table->decimal('feels_like', 9, 2);
            $table->decimal('temp_min', 9, 2);
            $table->decimal('temp_max', 9, 2);
            $table->integer('pressure');
            $table->integer('humidity');
            $table->string('description');
            $table->string('icon');
            $table->timestamps();
        });
    }
}
