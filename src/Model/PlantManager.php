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

    public function insert(array $plants): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`name`, `picture`) VALUES (:name, :picutre)"
        );
        $statement->bindValue(':name', $plants['name'], \PDO::PARAM_STR);
        $statement->bindValue(':picture', $plants['picture'], \PDO::PARAM_STR);
        $statement->execute();
        // return (int)$this->pdo->lastInsertId();
    }
}
