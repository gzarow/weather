<?php

namespace Gzarow\Weather\Admin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * LocalizationWeather
 */
class LocalizationWeather extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather.localization_weather';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'localization_id',
        'temp',
        'feels_like',
        'temp_min',
        'temp_max',
        'pressure',
        'humidity',
        'description',
        'icon',
        'api_data',
    ];
}
