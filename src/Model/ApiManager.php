<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiManager extends AbstractManager
{
    public const NGROCK = 'http://0413-86-195-148-141.ngrok.io';

    public function requestApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::NGROCK . "/music" . "/");

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->toArray();
            return $content;
        }
    }
}
