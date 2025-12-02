<?php

namespace App\Components;

use GuzzleHttp\Client;
class ImportDataClient
{
        public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'timeout' => 60,
            'connect_timeout' => 10,
            'http_errors' => false,
            'verify' => false, // ← держите true, если возможно

        ]);
    }
}
