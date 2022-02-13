<?php

namespace Gzarow\Weather\Utilities;

use Gzarow\Weather\Admin\Models\LocalizationWeather;
use Gzarow\Weather\Utilities\Traits\HttpClient;

/**
 * OpenApiSource
 */
class OpenApiSource implements WeatherSource
{
    use HttpClient;

    const API_URL = 'http://api.openweathermap.org/data/2.5/weather?';
    const TIMEOUT = 10;
    const UNITS = 'metric';

    /**
     * Update weather
     *
     * @param  \Gzarow\Weather\Admin\Models\UserLocalization $localization
     * @return void
     */
    public function updateWeather($localization)
    {
        $response = $this->makeGetRequest(
            self::API_URL .
            'lat=' . $localization->latitude .
            '&lon=' . $localization->longitude .
            '&units=' . self::UNITS .
            '&appid=' . config('weather.openWeatherApiKey'),
            self::TIMEOUT);

        if ($response) {
            $data = json_decode($response, 1);
            $this->updateLocalizationWeather($data, $localization->id);
        }
    }

    /**
     * Update weather in database
     *
     * @param  array $data
     * @param  integer $localizationId
     * @return void
     */
    private function updateLocalizationWeather($data, $localizationId)
    {
        $preparedData = $this->prepareData($data);
        LocalizationWeather::updateOrCreate(['localization_id' => $localizationId], $preparedData);
    }

    /**
     * Prepare data for update in database
     *
     * @param  array $data
     * @return array
     */
    private function prepareData($data)
    {
        $prepared = [
            'temp' => $data['main']['temp'],
            'feels_like' => $data['main']['feels_like'],
            'temp_min' => $data['main']['temp_min'],
            'temp_max' => $data['main']['temp_max'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity'],
            'description' => $data['weather'][0]['description'],
            'icon' => $data['weather'][0]['icon'],
            'api_data' => json_encode($data),
        ];
        return $prepared;
    }
}
