<?php

namespace App\Entity;


use App\Repository\ClubRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[TargetRepository(name: ClubRepository::class)]
#[Table(name: "clubs")]
class Club
{
    private int $id;
    private string $name;
    private int $sport_id;

    public function getId(): int
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

    public function getSportId(): int
    {
        return $this->sport_id;
    }

    public function setSportId(int $sport_id): void
    {
        $this->sport_id = $sport_id;
    }

}