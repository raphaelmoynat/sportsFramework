<?php

namespace App\Repository;


use App\Entity\Club;
use App\Entity\Sport;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(name: Club::class)]
class ClubRepository extends Repository
{
    public function findBySport(Sport $sport):array
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->tableName WHERE sport_id = :sport_id");

        $query->execute([
            "sport_id"=>$sport->getId()
        ]);

        $items = $query->fetchAll(\PDO::FETCH_CLASS,get_class(new $this->targetEntity()));

        return $items;
    }

    public function save(Club $club)
    {
        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET name = :name, sport_id = :sport_id");

        $query->execute([
            "name"=>$club->getName(),
            "sport_id"=>$club->getSportId(),

        ]);
    }


}