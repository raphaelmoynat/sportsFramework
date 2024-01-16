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

            return $this->redirect("?type=sport&action=show&id=$sport_id");
        }
        return $this->redirect("?type=sport&action=index");

    }

    public function delete():Response
    {
        $clubId = null;

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
        $idEdit = null;
        $name = null;

        if(!empty($_POST['idEdit']) && $_POST['idEdit'] != ""){ $idEdit = $_POST['idEdit']; }
        if(!empty($_POST['name']) && $_POST['name'] != ""){ $name = $_POST['name']; }

        if($idEdit && $name)
        {
            $clubRepository = new ClubRepository();
            $club = $clubRepository->find($idEdit);
            if(!$club)
            {
                return $this->redirect();
            }

            $club->setName($name);
            $idSport = $club->getSportId();

            $clubRepository->update($club);

            return $this->redirect("?type=sport&action=show&id=$idSport");

        }

        $id = null;

        if(!empty($_GET["id"]) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }

        if(!$id){
            $this->redirect();

        }

        $clubRepository = new ClubRepository();
        $club = $clubRepository->find($id);
        return $this->render("club/edit", [
            "pageTitle"=> "Modifier un club",
            "club"=>$club
        ]);
    }
}