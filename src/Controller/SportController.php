<?php

namespace App\Controller;

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

    public function create(){
        $this->render("sport/create",["pageTitle"=>"Ajouter Sport"]);

        if(isset($_POST['name']) &&
            isset($_POST['description']) &&
            isset($_POST['accessory'])
        ){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $accessory = $_POST['accessory'];

            $sportRepository= new SportRepository();
            $sportRepository->insert($name, $description, $accessory);


            return $this->redirect("?type=sport&action=index");
    }



}
}