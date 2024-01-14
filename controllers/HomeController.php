<?php

namespace Controllers;

use classes\View;
use classes\Login;

require_once("config/database.php");


class HomeController {

    private $educateurDAO;
    private $licencierDAO;

    public function __construct(array $daos = []) {
        $this->educateurDAO = $daos['educateurDAO'];
        $this->licencierDAO = $daos['licencierDAO'];
    }
    
    public function index() {

        $view = new View('home');
        
        $view->render([
            "titlePage" => "Espace d'accueil"
        ]);

    }

    public function login() {

        $login = new Login();
        
        $login->render();

    }

    public function log() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = htmlentities(nl2br($_POST['email']));
            $password = htmlentities(nl2br($_POST['password']));

            $educateur = $this->educateurDAO->log($email, $password);

            // starting new session if the admin educateur is found

            if(isset($educateur['id'])) {
                $_SESSION['email'] = $educateur['email'];
                $licencie = $this->licencierDAO->getByNumeroLicencier($educateur['licencie']);
                $_SESSION['nom'] = $licencie['nomLicencier'];
                $_SESSION['prenom'] = $licencie['prenomLicencier'];
                $_SESSION['success'] = "Connexion réussie !";
                header('Location: home');
            }
            else {
                $_SESSION['error'] = "Erreur de connexion : Veuillez vérifiez vos informations de connexion !";
                header('Location: login');
            }

            

        }

    }

    public function logout() {
        
        $_SESSION = array();
        session_destroy();
        
        header('Location: home');

    }
    
    
}


?>
