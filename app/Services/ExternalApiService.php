<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    public function fetchData(): string
    {

        $api = Http::get('https://jsonplaceholder.typicode.com/posts/5');

        if ($api->failed()) {
            throw new \Exception('La API externa no respondió.');
        }

        $title = $api->json('title');

        return $title;
    }
}