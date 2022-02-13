<?php

namespace Gzarow\Weather;

use Gzarow\Weather\Admin\Console\WeatherUpdateCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'weather');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'weather');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            // // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/weather.php' => config_path('weather.php'),
            ], 'config');

            $this->app->booted(function () {
                $schedule = app(Schedule::class);
                $schedule->command(WeatherUpdateCommand::class)->everyFifteenMinutes();
            });
        }

        // Registering package commands.
        $this->commands([
            WeatherUpdateCommand::class,
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['weather'];
    }
}
