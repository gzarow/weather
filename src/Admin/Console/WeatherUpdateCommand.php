<?php

namespace Gzarow\Weather\Admin\Console;

use Gzarow\Weather\Admin\Models\UserLocalization;
use Illuminate\Console\Command;

/**
 * WeatherUpdateCommand
 */
class WeatherUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather for database users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $localizations = UserLocalization::get();
        if ($localizations->isNotEmpty()) {
            foreach ($localizations as $localization) {
                dispatch(new \Gzarow\Weather\Admin\Jobs\UpdateWeather($localization))->onConnection('sync');
            }
        } else {
            $this->info('There is no localizations to update');
        }
    }
}
