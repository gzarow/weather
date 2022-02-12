<?php

namespace Gzarow\Weather\Utilities\Traits;

use GuzzleHttp\Client as Client;
use Illuminate\Support\Facades\Log;

trait HttpClient
{
    public function makeGetRequest($url, $timeout)
    {
        try {
            $client = new Client(['timeout' => $timeout]);

            $clientResponse = $client->request('GET', $url, []);
            $code = $clientResponse->getStatusCode();
            if ($code == 200) {
                return $clientResponse->getBody()->getContents();
            }
        } catch (\Exception $e) {
            Log::error('Get data failed, ' . 'message: ' . $e->getMessage());
            return null;
        }
    }
}
