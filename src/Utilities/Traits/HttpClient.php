<?php

namespace Gzarow\Weather\Utilities\Traits;

use Illuminate\Support\Facades\Http;

trait HttpClient
{
    public function makeGetRequest($url)
    {
        $response = Http::get($url);
        return $response;
    }
}
