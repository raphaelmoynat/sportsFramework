<?php

namespace App\Controller;

use App\Entity\Sport;
use \Core\Controller\Controller;
use \App\Repository\SportRepository;
use \Core\Http\Response;

class SportController extends Controller
{
    public function index():Response
    {
        $sportRepository = new SportRepository();
        $sports = $sportRepository->findAll();

        return $this->render("sport/index", [
            "pageTitle"=> "Welcome to sports",
            "sports"=>$sports
        ]);
    }

    public function show():Response
    {
        if(!empty($_GET["id"]) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }
        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);



        return $this->render("sport/show", [
            "pageTitle"=> "Page Sport",
            "sport"=>$sport
        ]);
    }

    public function create():Response
    {
        $name =null;
        $description =null;
        $accessory =null;

        if(!empty($_POST['name'])){$name = $_POST['name'];}
        if(!empty($_POST['description'])){$description = $_POST['description'];}
        if(!empty($_POST['accessory'])){$accessory = $_POST['accessory'];}

        if($name && $description && $accessory)
        {
            $sport = new Sport();
            $sport->setName($name);
            $sport->setDescription($description);
            $sport->setAccessory($accessory);

            $sportRepository = new SportRepository();

            $sportRepository->save($sport);

            return $this->redirect("?type=sport&action=index");
        }

        return $this->render("sport/create", [
            "pageTitle"=>"Nouveau Sport"
        ]);
    }

    public function delete():Response
    {
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }

        if(!$id){
            return $this->redirect();
        }


        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);

        if(!$sport)
        {
            return $this->redirect();
        }

        $sportRepository->delete($sport);

        return $this->redirect("?type=sport&action=index");

    }

    public function edit():Response
    {
        $idEdit = null;
        $name = null;
        $description = null;
        $accessory = null;

        if(!empty($_POST['idEdit']) && $_POST['idEdit'] != ""){ $idEdit = $_POST['idEdit']; }
        if(!empty($_POST['name']) && $_POST['name'] != ""){ $name = $_POST['name']; }
        if(!empty($_POST['description']) && $_POST['description'] != ""){ $description = $_POST['description']; }
        if(!empty($_POST['accessory']) && $_POST['accessory'] != ""){ $accessory = $_POST['accessory']; }


        if($idEdit && $name && $description && $accessory)
        {
            $sportRepository = new SportRepository();
            $sport = $sportRepository->find($idEdit);
            if(!$sport)
            {
                return $this->redirect();
            }

            $sport->setName($name);
            $sport->setDescription($description);
            $sport->setAccessory($accessory);

            $sportRepository->update($sport);

            return $this->redirect("?type=sport&action=index");

        }

        $id = null;

        if(!empty($_GET["id"]) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }

        if(!$id){
            $this->redirect();

        }

        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);

        return $this->render("sport/edit", [
            "pageTitle"=> "Un Sport",
            "sport"=>$sport
        ]);



    }
}