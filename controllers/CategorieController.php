<?php

namespace Controllers;

use classes\View;
use classes\models\CategorieModel;

class CategorieController
{
    protected $categoriesDAO;

    public function __construct(array $daos = []) {
        $this->categoriesDAO = $daos['categoriesDAO'];
    }

    public function index() {

        $categories = $this->categoriesDAO->getAllCategories();

        $view = new View('categorie/show');
        $view->render([
            "titlePage" => "Catégories",
            "categories" => $categories
        ]);
    }

    public function add() {

        $view = new View('categorie/add');
        $view->render([
            "titlePage" => "Ajouter catégorie",
        ]);
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $codeRaccourci = $_POST['codeRaccourci'];
            $newcategory = $this->categoriesDAO->create(new CategorieModel($codeRaccourci,$nom));
            if ($newcategory) {
                header('Location: categorie');
            }
        }

    }

    public function edit($params) {

        $categorie = $this->categoriesDAO->getByCodeRaccourci($params["id"]);

        $view = new View('categorie/edit');
        $view->render([
            "titlePage" => "Modifier catégorie",
            "categorie" => $categorie,
        ]);
    }

    public function update($params) {
        extract($params);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'];
            $codeRaccourci = $_POST['codeRaccourci'];

            $newcategory = $this->categoriesDAO->update($id , new CategorieModel($codeRaccourci,$nom));

            if ($newcategory) {
                header("Location: categorie");
            } 
        }
    }

    public function delete($params) {
        $id = $params["id"];
        $this->categoriesDAO->deleteById($id);
        header("Location: categorie");
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
        