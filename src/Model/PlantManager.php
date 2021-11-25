<?php

namespace App\Model;

class PlantManager extends AbstractManager
{
    public const TABLE = 'plant';

    public function getAllPlants()
    {
        $this->selectAll();
    }
}
