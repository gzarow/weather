<?php

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Gzarow\Weather\Admin\Http\Controllers'], function () {
    Route::get('weather/{userId}', ['as' => 'weather.getWeather', 'uses' => 'WeatherController@getUserWeather']);
});
