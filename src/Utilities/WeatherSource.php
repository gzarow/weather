<?php
namespace Gzarow\Weather\Utilities;

interface WeatherSource
{
    public function updateWeather($localization);
}
