<?php

namespace Gzarow\Weather\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocalization extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather.user_localization';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'city_name',
        'latitude',
        'longitude',
    ];
}
