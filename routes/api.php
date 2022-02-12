<?php

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Gzarow\Weather\Admin\Http\Controllers'], function () {
    Route::get('weather/{user}', ['as' => 'weather.getWeather', 'uses' => 'WeatherController@getUserWeather']);
});
