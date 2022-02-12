<?php

namespace Gzarow\Weather\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocalization extends Model
{
    /**
     * Nazwa tabeli w bazie.
     *
     * @var string
     */
    protected $table = 'weather.user_localization';

    /**
     * Lista pól które można zapisać do bazy
     * @var array
     */
    protected $fillable = [
        'user_id',
        'city_name',
        'latitude',
        'longitude',
    ];
}
