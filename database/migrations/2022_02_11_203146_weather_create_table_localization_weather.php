<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WeatherCreateTableLocalizationWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather.localization_weather', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('localization_id');
            $table->foreign('localization_id')->references('id')->on('weather.user_localization')->onDelete('cascade');
            $table->decimal('temp', 9, 2);
            $table->decimal('feels_like', 9, 2);
            $table->decimal('temp_min', 9, 2);
            $table->decimal('temp_max', 9, 2);
            $table->integer('pressure');
            $table->integer('humidity');
            $table->string('description');
            $table->string('icon');
            $table->json('api_data');
            $table->timestamps();
        });
    }
}
