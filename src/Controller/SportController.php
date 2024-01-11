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
        if(!empty($_GET['id']) && ctype_digit($_GET['id']))
        {
            $id = $_GET['id'];
        }

        $sportRepository = new SportRepository();
        $sportRepository->delete($id);

        return $this->redirect("?type=sport&action=index");

    }

    public function edit():Response
    {
        $id = $_GET['id'];
        $sportRepository = new SportRepository();
        $sport = $sportRepository->find($id);

        $name = null;
        $description = null;
        $accessory =null ;

        if(!empty($_POST['name'])){$name = $_POST['name'];}
        if(!empty($_POST['description'])){$description = $_POST['description'];}
        if(!empty($_POST['accessory'])){$accessory = $_POST['accessory'];}


        if(isset($_POST['name']) && isset($_POST['description'])
            && isset($_POST['accessory']))
        {
            $sport = new Sport();
            $sport->setName($name);
            $sport->setDescription($description);
            $sport->setAccessory($accessory);


            $sportRepository->update($sport);

            return $this->redirect("?type=sport&action=index");
        }

        return $this->render("sport/edit", [
            "pageTitle"=>"Modifier Sport", "sport"=>$sport
        ]);


//ne marche pas encore a refaire

    }
}