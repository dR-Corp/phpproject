<?php

namespace Controllers;
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../classes/models/Connexion.php');
require_once(__DIR__ . '/../classes/dao/EducationDAO.php');
require_once(__DIR__ . '/../classes/models/EducateurModel.php');


$controller = new AdminController();
$controller->index();
class AdminController
{
    public function index() {
        include('../views/admin/admin_connexion.php');
    }
}
