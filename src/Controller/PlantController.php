<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ApiManager;
use App\Model\PlantManager;

class PlantController extends AbstractController
{
    public const URL_NGROK = 'https://9dcb-86-195-148-141.ngrok.io';
    /**
     * Display home page
     *
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $plantManager = new PlantManager();
        $plants = $plantManager->getAllPlants();
        return $this->twig->render('Home/home.html.twig', ['plants' => $plants]);
    }

    public function show(int $id)
    {
        $plantManager = new PlantManager();
        $plant = $plantManager->getOnePlant($id);

        // $apiManager = new ApiManager();
        // $requests = $apiManager->requestApi();
        // return $this->twig->render('Show/show.html.twig', ['plant' => $plant, 'requests' => $requests]);

        $apiManager = new ApiManager();
        $requests = $apiManager->requestApi();
        $key = $id - 1;
        $request = $requests[$key];
        return $this->twig->render('Show/show.html.twig', ['plant' => $plant, 'request' => $request,
        'url_ngrok' => self::URL_NGROK]);
    }

    // showArray is for test //
    public function showArray()
    {
        $apiManager = new ApiManager();
        $requests = $apiManager->requestApi();
        return $this->twig->render('Item/show.html.twig', ['requests' => $requests]);
    }

    public function add()
    {
        return $this->twig->render('Add/add.html.twig');
    }
}
