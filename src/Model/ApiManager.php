<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public function requestApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', '');

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->toArray();
            return $content;
        }
    }
}
