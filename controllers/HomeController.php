<?php
require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/ContactDAO.php");
require_once("../classes/dao/CategoriesDAO.php");
require_once("../classes/dao/LicencierDAO.php");
require_once("../classes/models/LicencierModel.php");

$controller=new HomeController();

$controller->index();


class HomeController {
   
    public function index() {
        include('../views/home.php');
    }
    
}


?>
