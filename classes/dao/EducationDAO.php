<?php

namespace Classes\dao;

use classes\models\Connexion;
use classes\models\EducateurModel;
use classes\dao\LicencierDAO;
use PDO;
use PDOException;

require_once(__DIR__ . '/../../config/database.php');
require_once(__DIR__ . '/EducationDAO.php');
require_once(__DIR__ . "/LicencierDAO.php");

class EducationDAO extends LicencierDAO {

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function log($email, $password) {
        $query = "SELECT * FROM educateur WHERE estAdmin = 1 AND email = :email AND mdp = :password";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':email', $email , PDO::PARAM_STR);
        $stmt->bindParam(':password', $password , PDO::PARAM_STR);
        $stmt->execute();
        $educateur = $stmt->fetch();
        return $educateur;
    }

    public function getById($id) {
        $query = "SELECT * FROM educateur WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        $educateur = $stmt->fetch();

        return $educateur;
    }

    public function createEducateur(EducateurModel $educateur) {

        try {
            $query= "INSERT INTO educateur (licencie, email,mdp , estAdmin) VALUES (?, ?, ?, ?)";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$educateur->getNumeroLicence() , $educateur->getEmail(),  $educateur->getMdp(), $educateur->getEstAdmin()]);
            return true;
        } catch (PDOException $e) {
            file_put_contents("create.txt" ," \n". $e->getMessage() ."", FILE_APPEND);
            return false;
        }

    }

    public function update($id) {
        
        try {
            $estAdmin = (isset($_POST['estAdmin']) && $_POST['estAdmin'] == "on")  ? 1 : 0;
                        
            if(isset($_POST['mdp']) && $_POST['mdp'] !="") {
                $query = "UPDATE educateur SET licencie = :licencie, email = :email, mdp =:mdp, estAdmin =:estAdmin WHERE id = :id";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':licencie', $_POST['licencie']); 
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':estAdmin', $estAdmin); 
                $stmt->bindParam(':mdp', $_POST['mdp']); 
                return $stmt->execute();
            }
            else {
                $query = "UPDATE educateur SET licencie = :licencie, email = :email, estAdmin =:estAdmin WHERE id = :id";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':licencie', $_POST['licencie']); 
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':estAdmin', $estAdmin); 
                return $stmt->execute();
            }          

        } catch (PDOException $e) {
            echo "false" . $e->getMessage();
        }
    }


    public function deleteById($id) {
        try {
            $query ="DELETE FROM educateur WHERE id = :id";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return 'false' . $e->getMessage();
        }
    }
    public function getAllEducateur() {
        $educateurs = array();

        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateur ");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $educateur = new EducateurModel(
                    $row["id"],
                    $row["licencie"],
                    $row["email"],
                    "",
                    $row["estAdmin"]
                );
                $educateurs[] = $educateur;
            }

            return $educateurs;
        } catch (PDOException $e) {
            return [];
        }
    }


}
