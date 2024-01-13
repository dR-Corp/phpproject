<?php

namespace Controllers;
use Classes\dao\CategoriesDAO;
use Classes\models\CategorieModel;
use Classes\models\Connexion;

require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '../../classes/models/CategorieModel.php');
require_once(__DIR__ . '../../classes/models/Connexion.php');
require_once(__DIR__ . '../../classes/dao/CategoriesDAO.php');

$categoriesDAO = new CategoriesDAO(new Connexion);
$controllerCate=new CategorieController($categoriesDAO);

if(isset($_POST['add']) && $_POST['add'] === 'Ajouter'){
    
    $controllerCate->addCategory();
} else if (isset($_GET['codeRaccourci']) && $_GET['delete'] === 'supprimer') {
    $codeRaccourci = $_GET['codeRaccourci'];
    $controllerCate->deleteCategory($codeRaccourci);
    header('Location: CategorieController.php');
    exit();
}else {
    include(__DIR__ . '/../views/categories_views/add_category.php');
}

class CategorieController
{
    protected $categoriesDAO;
    public function __construct(CategoriesDAO $categoriesDAO ){
        $this->categoriesDAO = $categoriesDAO;
    }

    public function index(){
        $categories = $this->categoriesDAO->getAllCategories();
    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $codeRaccourci = $_POST['codeRaccourci'];

            $newcategory = $this->categoriesDAO->create(new CategorieModel($codeRaccourci,$nom));
            if ($newcategory) {
                header('Location: CategorieController.php');
            }
        }
        include(__DIR__ . '/../views/categories_views/add_category.php');
    }

    public function editCategory($id) {
        if ($_SERVER[''] === 'POST') {
            $nom = $_POST['nom'];
            $codeRaccourci = $_POST['codeRccourci'];
            $newcategory = $this->categoriesDAO->update($id , new CategorieModel($codeRaccourci,$nom));
            if ($newcategory) {
                header('Location: CategorieController.php?id='.$id);

            }

        }
    }
    public function deleteCategory($codeRaccourci) {
        $this->categoriesDAO->deleteById($codeRaccourci);
    }

}
        