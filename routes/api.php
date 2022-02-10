<?php

Route::group(['middleware' => [], 'prefix' => 'api', 'namespace' => 'Gzarow\Weather\Admin\Http\Controllers'], function () {
    Route::get('weather', ['as' => 'weather.getWeather', 'uses' => 'WeatherController@getWeather']);
});
