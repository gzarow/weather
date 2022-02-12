<?php

namespace Gzarow\Weather\Utilities;

class OpenApiWeather extends Weather
{

    public function __construct()
    {
        $this->weatherApiSource = new OpenApiSource();
    }

}
