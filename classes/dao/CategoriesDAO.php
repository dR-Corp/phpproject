<?php

namespace Classes\dao;

use classes\models\CategorieModel;
use classes\models\Connexion;
use PDO;
use PDOException;


class CategoriesDAO
{
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function getAllCategories() {
        try {
            $query ="SELECT * FROM categorie";

            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll();

            foreach ($rows as $row) {
                $category = new CategorieModel($row["codeRaccourci"] , $row["nom"]);

                $category->setCodeRaccourci($row["codeRaccourci"]);
                $category->setNom($row["nom"]);

                $categories[] = $category;
            }
        return $categories;

        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
			die("Error".$e->getMessage());
        }

    }

    public function getByCodeRaccourci($codeRaccourci) {

        $query = "SELECT * FROM categorie WHERE codeRaccourci = :codeRaccourci";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':codeRaccourci', $codeRaccourci);
        $stmt->execute();
        $categorie = $stmt->fetch();

        return $categorie;
    } 
    
    public function create(CategorieModel $category) {
        try {
            $query = "INSERT INTO categorie (codeRaccourci , nom) VALUES (:codeRaccourci, :nom)";

            $stmt = $this->connexion->pdo->prepare($query);
            
            $codeRaccourci = $category->getCodeRaccourci();
            $nom = $category->getNom();

            $stmt->execute(array(':codeRaccourci' => $codeRaccourci ,':nom' =>$nom));
            return true;

        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            echo  "erreur" . $e->getMessage();
            return false;
        }

    }



    // MÃ©thode pour mettre Ã  jour un contact
    public function update($id, CategorieModel $category) {
        
        try {
            $query = "UPDATE categorie SET nom = :nom, codeRaccourci = :codeRaccourci WHERE codeRaccourci = :id";
            // print_r($query);
            // exit;
            $stmt = $this->connexion->pdo->prepare($query);
            
            $nom = $category->getNom();
            $codeRaccourci = $category->getCodeRaccourci();

            $t = array(':id' =>$id, ':nom' =>$nom , ':codeRaccourci' => $codeRaccourci);
            return $stmt->execute($t);

        } catch (PDOException $e) {
            echo "false" . $e->getMessage();
            return false;
        }
    }

    public function deleteById($codeRaccourci) {
        try {
            $query ="DELETE FROM categorie WHERE codeRaccourci = :codeRaccourci";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->bindParam(':codeRaccourci', $codeRaccourci);
            $stmt->execute();
            
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return 'false' . $e->getMessage();
        }
    }
}
