<?php

namespace Gzarow\Weather\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class UserWeather extends Model
{
    /**
     * Nazwa tabeli w bazie.
     *
     * @var string
     */
    protected $table = 'weather.user_weather';

    /**
     * Lista pól które można zapisać do bazy
     * @var array
     */
    protected $fillable = [
        'user_id',
        'city_name',
        'city_id',
        'longitude', 
        'latitude',
        'temp',
        'feels_like',
        'temp_min',
        'temp_max',
        'pressure',
        'humidity',
        'description',
        'icon'
    ];
}
