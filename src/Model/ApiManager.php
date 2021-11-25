<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public function requestApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.deezer.com/user/2529/playlists');

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->toArray();
            return $content;
        }
    }
}
