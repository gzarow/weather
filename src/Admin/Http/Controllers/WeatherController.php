<?php

namespace Gzarow\Weather\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WeatherController extends Controller
{

    public function getWeather(Request $request)
    {
      return 'Test';
    }
}
