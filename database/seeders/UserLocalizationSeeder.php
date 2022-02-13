<?php

namespace Gzarow\Weather\Database\Seeders;

use App\Models\User;
use Gzarow\Weather\Admin\Models\UserLocalization;
use Illuminate\Database\Seeder;

class UserLocalizationSeeder extends Seeder
{
    private $localizations = [
        [
            'city_name' => 'Rzeszów',
            'latitude' => 50.0055192,
            'longitude' => 21.9184156,
        ],
        [
            'city_name' => 'Londyn',
            'latitude' => 51.5287718,
            'longitude' => -0.2416802,
        ],
        [
            'city_name' => 'Rzym',
            'latitude' => 41.9102415,
            'longitude' => 12.3959153,
        ],
        [
            'city_name' => 'Paryż',
            'latitude' => 48.8589466,
            'longitude' => 2.2769956,
        ],
        [
            'city_name' => 'Nowy York',
            'latitude' => 40.6976637,
            'longitude' => -74.1197637,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        foreach ($users as $user) {
            UserLocalization::updateOrCreate(
                ['user_id' => $user->id],
                $this->localizations[rand(0, 4)]
            );
        }
    }
}
