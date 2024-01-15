<?php

namespace App\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Core\Http\Response;

class ClubController extends \Core\Controller\Controller
{
    public function create():Response
    {
        $name = null;
        $sport_id = null;



        if(!empty($_POST['name'])){$name = $_POST['name'];}
        if(!empty($_POST['sportId'])){$name = $_POST['sportId'];}

        if ($name && $sport_id){
            $club = new Club();
            $club->setName();
            $club->setSportId();

            $clubRepository = new ClubRepository();
            $clubRepository->save($club);

            return $this->redirect("?type=sport&action=show");
        }
        return $this->redirect("type=sport&action=index");

    }
}