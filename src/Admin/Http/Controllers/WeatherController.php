<?php

namespace Gzarow\Weather\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Gzarow\Weather\Utilities\OpenApiWeather;


class WeatherController extends Controller
{
    public function getUserWeather(Request $request, User $user)
    {  
      $openApi = new OpenApiWeather();
      $result = $openApi->getCurrentWeather($user->id);
      return $result;
    }
}
