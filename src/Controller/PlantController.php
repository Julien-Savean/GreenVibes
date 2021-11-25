<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\PlantManager;

class PlantsController extends AbstractController
{
    /**
     * Display home page
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
        return $this->twig->render('Show/show.html.twig', ['plant' => $plant]);
    }
}
