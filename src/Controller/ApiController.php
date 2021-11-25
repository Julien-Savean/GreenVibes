<?php

namespace App\Controller;

use App\Model\ApiManager;

class ApiController extends AbstractController
{
    public function response()
    {
        $apiManager = new ApiManager();
        $request = $apiManager->requestApi();

        return $this->twig->render('Api/response.html.twig', ['request' => $request]);
    }
}
