<?php

namespace Gzarow\Weather\Utilities;

/**
 * OpenApiWeather
 */
class OpenApiWeather extends Weather
{

    public function __construct()
    {
        $this->weatherApiSource = new OpenApiSource();
    }
}
