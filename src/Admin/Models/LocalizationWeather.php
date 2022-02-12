<?php

namespace Gzarow\Weather\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class LocalizationWeather extends Model
{
    /**
     * Nazwa tabeli w bazie.
     *
     * @var string
     */
    protected $table = 'weather.localization_weather';

    /**
     * Lista pól które można zapisać do bazy
     * @var array
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
    ];
}
