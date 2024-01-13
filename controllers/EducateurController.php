<?php

namespace Controllers;

use Classes\dao\EducationDAO;
use Classes\dao\LicencierDAO;
use Classes\models\Connexion;
use Classes\models\EducateurModel;

require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../classes/models/EducateurModel.php');
require_once(__DIR__ . '/../classes/models/LicencierModel.php');
require_once(__DIR__ . '/../classes/models/Connexion.php');
require_once(__DIR__ . '/../classes/dao/EducationDAO.php');
require_once(__DIR__ . '/../classes/dao/LicencierDAO.php');

$educateurDAO = new EducationDAO(new Connexion);
$licencierDAO = new LicencierDAO(new Connexion);
$controllerEducateur = new EducateurController($educateurDAO , $licencierDAO);

if (isset($_POST['addEducateur']) && $_POST['addEducateur'] === 'Ajouter') {
    $controllerEducateur->addEducateur();
} elseif (isset($_GET['id']) && isset($_GET['delete']) && $_GET['delete'] === 'supprimer') {
    $id = $_GET['id'];
    $controllerEducateur->deleteEducateurById($id);
    header('Location: EducateurController.php');
    exit();
} else {
    include(__DIR__ . '/../views/educateur_views/add_educateur.php');
}

class EducateurController
{
    private $educateurDAO;
    private $licencierDAO;

    public function __construct(EducationDAO $educateurDAO , LicencierDAO $licencierDAO)
    {
        $this->educateurDAO = $educateurDAO;
        $this->licencierDAO = $licencierDAO;
    }

    public function addEducateur()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numeroLicencier = $_POST['licencie'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $estAdmin = $_POST['estAdmin'] == "on" ? true : false ;

            $newEducateur = $this->educateurDAO->createEducateur(new EducateurModel(0, $numeroLicencier, $email, $mdp , $estAdmin));
            
            if ($newEducateur) {
                header('Location: EducateurController.php');
                exit();
            }
        }

        include(__DIR__ . '/../views/educateur_views/add_educateur.php');
    }

    public function getEducateurById($id)
    {
        return $this->educateurDAO->getById($id);
    }

    public function deleteEducateurById($id)
    {
        $this->educateurDAO->deleteById($id);
    }

}
