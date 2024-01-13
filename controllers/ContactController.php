<?php

namespace Controllers;
use Classes\dao\ContactDAO;
use Classes\models\Connexion;
use Classes\models\ContactModel;

require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '../../classes/models/ContactModel.php');
require_once(__DIR__ . '../../classes/models/Connexion.php');
require_once(__DIR__ . '../../classes/dao/ContactDAO.php');

$contactDAO=new ContactDAO(new Connexion());
$controller=new ContactController($contactDAO);
    
if (isset($_POST['action']) && $_POST['action'] === 'Ajouter') {
    $controller->addContact();
} elseif (isset($_GET['id']) && isset($_GET['delete']) && $_GET['delete'] === 'supprimer') {
    $controller->deleteContact($_GET['id']);
    header('Location: ContactController.php');
    exit();
} else if(isset($_POST['modify']) ) {
    $contact = $contactDAO->getById($_POST['id']);
    $contactDAO->update($_POST['id']);
    header('Location: ContactController.php');
}else{
    include(__DIR__ . '/../views/licencier_views/show_licencier.php');
}

class ContactController
{ 
    private $contactDAO;
    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index(){
        $contacts = $this->contactDAO->getAll();
    }
    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nomc = $_POST['nomc'];
            $prenomc = $_POST['prenomc'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $newcontact = $this->contactDAO->create(new ContactModel($nomc, $prenomc, $email, $tel));
            
            if ($newcontact) {
                header('Location: ContactController.php');
            }
            
        }
        include(__DIR__ . '/../views/licencier_views/add_licencier.php');

    }

    public function editContact($id) {
        $this->contactDAO->getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomc = $_POST['nomc'];
            $prenomc = $_POST['prenomc'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $contact = new ContactModel($nomc, $prenomc, $email, $tel);

            if ($this->contactDAO->update($id)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location: ContactController.php?id=' . $id);
                exit();
            } else {
                echo "Erreur lors de la modification du contact.";
            }
        }
        // Inclure la vue pour afficher le formulaire de modification du contact
        include(__DIR__ . '/../views/licencier_views/add_licencier.php');

    }

    public function viewContact($id) {
        $contact = $this->contactDAO->getById($id);
        // include('../views/view_contact.php');
    }

    public function deleteContact($id) {
         $this->contactDAO->deleteById($id);
    }
}
      




       
?>
