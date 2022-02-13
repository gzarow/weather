<?php

namespace Gzarow\Weather\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gzarow\Weather\Admin\Resources\Weather as WeatherResource;
use Gzarow\Weather\Utilities\OpenApiWeather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class WeatherController
 * @package Gzarow\Weather\Admin\Http\Controllers;
 */
class WeatherController extends Controller
{
    public function getUserWeather(Request $request, User $user)
    {
        try {
            $openApi = new OpenApiWeather();
            $weather = $openApi->getCurrentWeatherInfo($user->id);
        } catch (\Exception $e) {
            Log::error('Get current weather for user failed: ' . ' message: ' . $e->getMessage());
            $res = ['message' => $e->getMessage(), 'error' => true];
            $code = 500;
            return \response()->json($res)->setStatusCode($code);
        }
        return WeatherResource::collection($weather);
    }
}
