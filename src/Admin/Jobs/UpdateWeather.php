<?php

namespace Gzarow\Weather\Admin\Jobs;

use Exception;
use Gzarow\Weather\Utilities\OpenApiWeather;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class UpdateWeather
 * @package Gzarow\Weather\Admin\Jobs;
 */
class UpdateWeather implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Timeout in seconds.
     *
     * @var int
     */
    public $timeout = 30;

    private $localization;

    public function __construct($localization)
    {
        $this->localization = $localization;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        $openApi = new OpenApiWeather();
        $openApi->startUpdateWeather($this->localization);
    }

}
