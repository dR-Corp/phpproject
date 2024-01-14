<?php

namespace Controllers;

use classes\View;
use classes\models\ContactDAO;

class ContactController
{ 
    private $contactDAO;

    public function __construct(array $daos = []) {
        $this->contactDAO = $daos['contactDAO'];
    }

    public function index() {

        $contacts = $this->contactDAO->getAll();

        $view = new View('contact/show');
        $view->render([
            "titlePage" => "Contacts",
            "contacts" => $contacts
        ]);
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
