<?php

namespace Controllers;

use Classes\dao\CategoriesDAO;
use Classes\dao\ContactDAO;
use Classes\dao\LicencierDAO;
use Classes\models\Connexion;
use Classes\models\ContactModel;
use Classes\models\LicencierModel;

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '../../classes/models/CategorieModel.php');
require_once(__DIR__ . '../../classes/models/Connexion.php');
require_once(__DIR__ . '../../classes/models/LicencierModel.php');
require_once(__DIR__ . '../../classes/models/ContactModel.php');
require_once(__DIR__ . '../../classes/dao/CategoriesDAO.php');
require_once(__DIR__ . '../../classes/dao/ContactDAO.php');
require_once(__DIR__ . '../../classes/dao/LicencierDAO.php');

$licencierDAO = new LicencierDAO(new Connexion);
$categorieDAO = new CategoriesDAO(new Connexion);
$contactDAO = new ContactDAO(new Connexion);
$controller=new LicencierController($licencierDAO, $contactDAO);

if(isset($_POST['addLicencier']) && $_POST['addLicencier'] === 'Ajouter'){
    $controller->addLicencier();
} else if (isset($_GET['numeroLicence']) && isset($_GET['delete']) && $_GET['delete'] === 'supprimer') {
    $numeroLicence = $_GET['numeroLicence'];
    $controller->deleteLicencier($numeroLicence);
    header('Location: LicencierController.php');
    exit();
    
} else if(isset($_POST['modify']) ) {
    $licencier = $licencierDAO->getByNumeroLicencier($_POST['numeroLicence']);
    $licencierDAO->update($_POST['numeroLicence']);
    header('Location: LicencierController.php');
}else{
    include(__DIR__ . '/../views/licencier_views/show_licencier.php');
}

class LicencierController
{
    private $licencierDAO;
    private $contactDAO;
    private $categorieDAO;

    public function index(){
        $licenciers = $this->licencierDAO->getAllLicencier();
    }
    public function __construct(LicencierDAO $licencierDAO = null, ContactDAO $contactDAO= null, CategoriesDAO $categorieDAO= null)
    {
        $this->licencierDAO = $licencierDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }
    public function addLicencier(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nomLicencier'];
            $prenom = $_POST['prenomLicencier'];
            $nomc = $_POST['nomc'];
            $prenomc = $_POST['prenomc'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $category = $_POST['categorieCodeRaccourci'];
            $this->contactDAO->create(new ContactModel($nomc, $prenomc, $email, $tel));
            $licencie = new LicencierModel(0,$nom, $prenom, $this->contactDAO->getLastId(), $category);
            $isLicencie = $this->licencierDAO->create($licencie);
            if ($isLicencie) {
                header('Location: LicencierController.php');
                exit();
            } 
        }
        include(__DIR__ .'/../views/licencier_views/add_licencier.php');
    }

    public function deleteLicencier($numeroLicence) {
        $this->licencierDAO->deleteByNumeroLicencier($numeroLicence );
    }
   
}
