<?php

namespace Classes\dao;

use classes\models\{Connexion, LicencierModel};
use PDO;
use PDOException;


class LicencierDAO
{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }
    
    public function create(LicencierModel $licence) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencier (nomLicencier, prenomLicencier, contactID, categorieCodeRaccourci) VALUES (?, ?, ?, ?)");
            $stmt->execute([$licence->getNom(), $licence->getPrenom(), $licence->getContactId(), $licence->getCategorie()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function getAllLicencier() {
        
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencier");
            $licences = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licences[] = new LicencierModel($row['numeroLicence'],$row['nomLicencier'], $row['prenomLicencier'], $row['contactID'], $row['categorieCodeRaccourci']);
            }
            return $licences;
        } catch (PDOException $e) {
            echo ($e->getMessage()); 
            return [];
        }
    }


    public function deleteByNumeroLicencier($numeroLicence) {
        try {
            $query ="DELETE FROM licencier WHERE numeroLicence = :numeroLicence";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->bindParam(':numeroLicence', $numeroLicence);
            $stmt->execute();
            
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return 'false' . $e->getMessage();
        }
    }
    public function getByNumeroLicencier($numeroLicence) {

        $query = "SELECT * FROM licencier WHERE numeroLicence = :numeroLicence";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':numeroLicence', $numeroLicence , PDO::PARAM_INT);
        $stmt->execute();
        $licencier = $stmt->fetch();

        return $licencier;

    }  

    public function update($numeroLicence) {
        
        try {
            $query = "UPDATE licencier SET nomLicencier = :nomLicencier, prenomLicencier = :prenomLicencier, categorieCodeRaccourci =:categorieCodeRaccourci WHERE numeroLicence = :numeroLicence";
            $stmt = $this->connexion->pdo->prepare($query);

            $stmt->bindParam(':numeroLicence', $numeroLicence, PDO::PARAM_INT);
            $stmt->bindParam(':nomLicencier', $_POST['nomLicencier']); 
            $stmt->bindParam(':prenomLicencier', $_POST['prenomLicencier']);
            $stmt->bindParam(':categorieCodeRaccourci', $_POST['categorieCodeRaccourci']); 
            
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "false" . $e->getMessage();
        }
    }
}
