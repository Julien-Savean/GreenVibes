<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public const NGROK = 'http://e2bc-90-83-11-209.ngrok.io/musics';

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
