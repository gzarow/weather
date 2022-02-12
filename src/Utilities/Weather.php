<?php
namespace Gzarow\Weather\Utilities;

use Gzarow\Weather\Admin\Models\User;

abstract class Weather
{
    /**
     * @var WeatherSource
     */
    protected $weatherApiSource;

    public function setWeatherSource(WeatherSource $ws)
    {
        $this->weatherApiSource = $ws;
    }

    public function startUpdateWeather($userId)
    {
        return $this->weatherApiSource->updateWeather($userId);
    }

    public function getCurrentWeatherInfo($userId)
    {
        $weatherInfo = User::getCurrentWeatherInfo($userId)->get();
        return $weatherInfo;
    }

}
