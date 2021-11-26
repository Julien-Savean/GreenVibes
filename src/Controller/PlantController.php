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
    public const URL_NGROK = 'http://e2bc-90-83-11-209.ngrok.io/music/';
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
        // $key = $id - 1;
        // $request = $requests[$key];
        return $this->twig->render('Show/show.html.twig', ['plant' => $plant, //'request' => $request,
    /*'url_ngrok' => self::URL_NGROK*/]);
    }

    public function showArray()
    {
        $apiManager = new ApiManager();
        $requests = $apiManager->requestApi();
        return $this->twig->render('Item/show.html.twig', ['requests' => $requests]);
    }

    public function add()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['name']) && !empty($_POST['picture'])) {
                $plant = array_map('trim', $_POST);
                if (empty($_POST['name'])) {
                    $errors[] = "Please enter a name";
                } elseif (empty($_POST['picture'])) {
                    $errors[] = "Please enter a url";
                } else {
                    $plantManager = new PlantManager();
                    $plantManager->insert($plant);
                    header('Location: /home');
                }
            } else {
                $errors[] = "Please fill in all fields";
            }
        }
        var_dump($errors) ;
        return $this->twig->render('Add/add.html.twig', ['errors' => $errors]);
    }
}
