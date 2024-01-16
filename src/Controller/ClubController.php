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
        if(!empty($_POST['sportId'])){$sport_id = $_POST['sportId'];}

        if ($name && $sport_id){
            $club = new Club();
            $club->setName($name);
            $club->setSportId($sport_id);

            $clubRepository = new ClubRepository();
            $clubRepository->save($club);

            return $this->redirect("?type=sport&action=show&id=" . $sport_id);
        }
        return $this->redirect("?type=sport&action=index");

    }

    public function delete():Response
    {
        $clubId = null;
        $sport_id= null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']))
        {
            $clubId = $_GET['id'];
        }



        if(!$clubId){
            return $this->redirect();
        }


        $clubRepository = new ClubRepository();
        $club = $clubRepository->find($clubId);

        if(!$club)
        {
            return $this->redirect();
        }

        $sport_id = $club->getSportId();

        $clubRepository->delete($club);

        return $this->redirect("?type=sport&action=show&id=$sport_id" );
    }

    public function edit():Response
    {

    }
}