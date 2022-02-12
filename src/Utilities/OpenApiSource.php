<?php

namespace Gzarow\Weather\Utilities;

use Gzarow\Weather\Admin\Models\User;

class OpenApiSource implements WeatherSource
{

    public function currentWeather($userId)
    {
        $weatherInfo = User::getCurrentWeatherInfo($userId)->get();
        return $weatherInfo;
    }
}
