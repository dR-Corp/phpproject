<?php

namespace Controllers;

use classes\View;
use classes\models\EducateurModel;

class EducateurController
{
    private $educateurDAO;
    private $licencierDAO;

    public function __construct(array $daos = []) {
        $this->educateurDAO = $daos['educateurDAO'];
        $this->licencierDAO = $daos['licencierDAO'];
    }

    public function index() {

        $educateurs = $this->educateurDAO->getAllEducateur();

        $view = new View('educateur/show');
        $view->render([
            "titlePage" => "Educateurs",
            "educateurs" => $educateurs,
            "licencierDAO" => $this->licencierDAO
        ]);
    }

    public function add() {
        
        $licencies = $this->licencierDAO->getAllLicencier();

        $view = new View('educateur/add');
        $view->render([
            "titlePage" => "Ajouter éducateur",
            "licencies" => $licencies
        ]);
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numeroLicencier = htmlentities(nl2br($_POST['licencie']));
            $email = htmlentities(nl2br($_POST['email']));
            $mdp = htmlentities(nl2br($_POST['mdp']));
            $estAdmin = $_POST['estAdmin'] == "on" ? true : false ;

            $newEducateur = $this->educateurDAO->createEducateur(new EducateurModel(0, $numeroLicencier, $email, $mdp , $estAdmin));
            
            if ($newEducateur) {
                header("Location: educateur");
            }
        }

    }

    public function edit($params) {

        $licencies = $this->licencierDAO->getAllLicencier();
        $educateur = $this->educateurDAO->getById($params["id"]);

        $view = new View('educateur/edit');
        $view->render([
            "titlePage" => "Modifier educateur",
            "educateur" => $educateur,
            "licencies" => $licencies,
        ]);
    }

    public function update($params) {
        extract($params);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $isEducateur = $this->educateurDAO->update($id);

            if ($isEducateur) {
                header("Location: educateur");
            } 
        }
    }

    public function delete($params) {
        $id = $params["id"];
        $this->educateurDAO->deleteById($id);
        header("Location: educateur");
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
