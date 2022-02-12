<?php
namespace Gzarow\Weather\Utilities;

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

    public function getCurrentWeather($userId)
    {
        return $this->weatherApiSource->currentWeather($userId);
    }

}
