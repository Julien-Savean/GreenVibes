<?php

namespace App\Model;

class PlantManager extends AbstractManager
{
    public const TABLE = 'Plants';

    public function getAllPlants()
    {
        return $this->selectAll();
    }

    public function getOnePlant(int $id)
    {
        return $this->selectOneById($id);
    }
}
