<?php

namespace Controllers;

use classes\View;
use classes\models\{ContactModel, LicencierModel};


class LicencierController
{
    private $licencierDAO;
    private $contactDAO;
    private $categorieDAO;

    public function __construct(array $daos = []) {
        $this->licencierDAO = $daos['licencierDAO'];
        $this->contactDAO = $daos['contactDAO'];
        $this->categorieDAO = $daos['categoriesDAO'];
    }

    public function index() {

        $licenciers = $this->licencierDAO->getAllLicencier();

        $view = new View('licencier/show');
        $view->render([
            "titlePage" => "Licenciers",
            "licenciers" => $licenciers,
            "contactDAO" => $this->contactDAO
        ]);
    }

    public function add() {
        
        $categories = $this->categorieDAO->getAllCategories();

        $view = new View('licencier/add');
        $view->render([
            "titlePage" => "Ajouter licencier",
            "categories" => $categories
        ]);
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = htmlentities(nl2br($_POST['nomLicencier']));
            $prenom = htmlentities(nl2br($_POST['prenomLicencier']));
            $nomc = htmlentities(nl2br($_POST['nomc']));
            $prenomc = htmlentities(nl2br($_POST['prenomc']));
            $email = htmlentities(nl2br($_POST['email']));
            $tel = htmlentities(nl2br($_POST['tel']));
            $category = htmlentities(nl2br($_POST['categorieCodeRaccourci']));
            $this->contactDAO->create(new ContactModel($nomc, $prenomc, $email, $tel));
            $licencie = new LicencierModel(0,$nom, $prenom, $this->contactDAO->getLastId(), $category);
            $isLicencie = $this->licencierDAO->create($licencie);
            if ($isLicencie) {
                header("Location: licencier");
            } 
        }

    }

    public function edit($params) {

        $categories = $this->categorieDAO->getAllCategories();
        $licencier = $this->licencierDAO->getByNumeroLicencier($params["id"]);
        $contact = $this->contactDAO->getById($licencier['contactID']);

        $view = new View('licencier/edit');
        $view->render([
            "titlePage" => "Modifier licencier",
            "licencier" => $licencier,
            "categories" => $categories,
            "contact" => $contact
        ]);
    }

    public function update($params) {
        extract($params);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->contactDAO->update($contactID);
            $isLicencie = $this->licencierDAO->update($id);

            if ($isLicencie) {
                header("Location: licencier");
            } 
        }
    }

    public function delete($params) {
        $numeroLicence = $params["id"];
        $contactID = $params["contactID"];
        $this->licencierDAO->deleteByNumeroLicencier($numeroLicence);
        $this->contactDAO->deleteById($contactID);
        header("Location: licencier");
    }

    public function indexLicencier() {
        $licenciers = $this->licencierDAO->getAllLicencier();
    }

    public function addLicencier(){

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $nom = $_POST['nomLicencier'];
        //     $prenom = $_POST['prenomLicencier'];
        //     $nomc = $_POST['nomc'];
        //     $prenomc = $_POST['prenomc'];
        //     $email = $_POST['email'];
        //     $tel = $_POST['tel'];
        //     $category = $_POST['categorieCodeRaccourci'];
        //     $this->contactDAO->create(new ContactModel($nomc, $prenomc, $email, $tel));
        //     $licencie = new LicencierModel(0,$nom, $prenom, $this->contactDAO->getLastId(), $category);
        //     $isLicencie = $this->licencierDAO->create($licencie);
        //     if ($isLicencie) {
        //         header('Location: LicencierController.php');
        //         exit();
        //     } 
        // }
        // include(__DIR__ .'/../views/licencier_views/add_licencier.php');
    }

    public function deleteLicencier($numeroLicence) {
        $this->licencierDAO->deleteByNumeroLicencier($numeroLicence );
    }
   
}
