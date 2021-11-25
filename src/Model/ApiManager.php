<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public const NGROK = 'http://9dcb-86-195-148-141.ngrok.io/musics';

    public function requestApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::NGROK);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            return $response->toArray();
        }
    }
}
