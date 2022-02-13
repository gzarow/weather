<?php
namespace Gzarow\Weather\Utilities;

use Gzarow\Weather\Admin\Models\User;

/**
 * Weather
 */
abstract class Weather
{
    /**
     * @var WeatherSource
     */
    protected $weatherApiSource;

    /**
     * Set Weather Source
     *
     * @param  mixed $ws
     * @return void
     */
    public function setWeatherSource(WeatherSource $ws)
    {
        $this->weatherApiSource = $ws;
    }

    /**
     * Start Update Weather
     *
     * @param  integer $userId
     * @return void
     */
    public function startUpdateWeather($userId)
    {
        return $this->weatherApiSource->updateWeather($userId);
    }

    /**
     * Get Current Weather Info for user
     *
     * @param  integer $userId
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCurrentWeatherInfo($userId)
    {
        $weatherInfo = User::getCurrentWeatherInfo($userId)->get();
        return $weatherInfo;
    }

}
