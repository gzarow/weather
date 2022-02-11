<?php

use Illuminate\Database\Migrations\Migration;

class WeatherCreateSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SCHEMA IF NOT EXISTS weather');
    }
}
