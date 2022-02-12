<?php

namespace Gzarow\Weather\Admin\Models;

use App\Models\User as AppUser;

class User extends AppUser
{
    public function scopeGetCurrentWeatherInfo($query, $userId)
    {
        $query->select(
            'weather.localization_weather.*',
            'users.id as user_id',
            'weather.user_localization.city_name',
            'weather.user_localization.longitude',
            'weather.user_localization.latitude'
        )
            ->leftJoin('weather.user_localization', 'users.id', '=', 'user_localization.user_id')
            ->leftJoin('weather.localization_weather', 'localization_weather.localization_id', '=', 'weather.user_localization.id')
            ->where('users.id', $userId);
        return $query;
    }
}
