<?php

namespace Classes\dao;

use classes\models\Connexion;
use classes\models\ContactModel;
use PDO;
use PDOException;

class ContactDAO{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(ContactModel $contact) {
        try {
            $query = "INSERT INTO contact (nomContact, prenomContact, email, tel) VALUES (:nomContact, :prenomContact, :email, :tel)";
           
            $stmt = $this->connexion->pdo->prepare($query);
            $nomc = $contact->getNomc();
            $prenomc = $contact->getPrenomc();
            $email = $contact->getEmail();
            $tel = $contact->getTel();

            $stmt->execute(array(':nomContact' =>$nomc , ':prenomContact' => $prenomc, ':email' => $email, ':tel' => $tel));

        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return "erreur" . $e->getMessage();
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {

        $query = "SELECT * FROM contact WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch();

        return $contact;

    }   

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les contacts
    public function getAll() {
        $contacts = array();
        try {
            $query ="SELECT * FROM contact";

            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll();

            foreach ($rows as $row) {
            $contact = new ContactModel();

                $contact->setId($row["id"]);
                $contact->setNomc($row["nomContact"]);
                $contact->setPrenomc($row["prenomContact"]);
                $contact->setEmail($row["email"]);
                $contact->setTel($row["tel"]);

                $contacts[] = $contact;
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
			die("Error".$e->getMessage());
        }

        return $contacts;

    }

    // MÃ©thode pour mettre Ã  jour un contact
    public function update($id) {
        
        try {
            $query = "UPDATE contact SET nomContact = :nomc, prenomContact = :prenomc, email = :email, tel = :tel WHERE id = :id";
            $stmt = $this->connexion->pdo->prepare($query);
    
            // Utilisez les valeurs directement à partir du tableau $_POST ou $_GET
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nomc', $_POST['nomc']); // Assurez-vous de vérifier la présence de la clé 'nom' dans votre tableau
            $stmt->bindParam(':prenomc', $_POST['prenomc']); // Assurez-vous de vérifier la présence de la clé 'prenom'
            $stmt->bindParam(':email', $_POST['email']); // Assurez-vous de vérifier la présence de la clé 'email'
            $stmt->bindParam(':tel', $_POST['tel']); // Assurez-vous de vérifier la présence de la clé 'tel'
    
            $stmt->execute();
    
        } catch (PDOException $e) {
            echo  "false" . $e->getMessage();
        }
        
    }
    

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $query ="DELETE FROM contact WHERE id = :id";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            echo 'false' . $e->getMessage();
        }
    }

    public function getLastId() {
        try {
            return $this->connexion->pdo->lastInsertId();
        } catch (PDOException $e) {
            return null;
        }
    }
}
