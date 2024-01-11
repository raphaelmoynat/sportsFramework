<?php

namespace App\Repository;

use App\Entity\Sport;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;


#[TargetEntity(name:Sport::class)]
class SportRepository extends Repository
{
    public function insert(string $name, string $description, string $accessory ):void
    {

        $query = $this->pdo->prepare("INSERT INTO sports SET name = :name, description = :description, accessory = :accessory");

        $query->execute([
            "name"=>$name,
            "description"=>$description,
            "accessory"=>$accessory
        ]);
    }

}