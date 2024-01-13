<?php

namespace Controllers;

use classes\View;
use classes\models\Connexion;

require_once("config/database.php");

// $controller=new HomeController();

// $controller->index();


class HomeController {
   
    public function index() {

        $view = new View('home');
        
        $view->render([
            "titlePage" => "Espace d'accueil"
        ]);

        // $page = "home";
        // $titlePage = "Espace d'accueil";
        // // include('../views/home.php');
        // include('../views/layout.php');
    }
    
}


?>
