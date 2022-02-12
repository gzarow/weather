<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WeatherCreateTableUserLocalization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather.user_localization', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('city_name');
            $table->decimal('longitude', 9, 2);
            $table->decimal('latitude', 9, 2);
            $table->timestamps();
        });
    }
}
