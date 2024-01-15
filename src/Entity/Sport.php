<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use App\Repository\SportRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(SportRepository::class)]
#[Table(name:"sports")]
class Sport
{
    private int $id;
    private string $name;
    private string $description;
    private string $accessory;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAccessory(): string
    {
        return $this->accessory;
    }

    public function setAccessory(string $accessory): void
    {
        $this->accessory = $accessory;
    }


    public function getClubs():array
    {
        $clubRepository = new ClubRepository();
        $clubs = $clubRepository->findBySport($this);
        return $clubs;
    }

}