<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public function requestApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://developers.deezer.com/api/explorer?url=playlist/908622995');

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->toArray();
            return $content;
        }
    }
}
