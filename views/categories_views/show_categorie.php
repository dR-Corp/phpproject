<?php
    require_once(__DIR__ . '/../../config/database.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . '/../../classes/models/CategorieModel.php');
    require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../../controllers/CategorieController.php");
    require_once(__DIR__ . '/../header.php');
    use Classes\models\Connexion;
    use Classes\dao\CategoriesDAO;


    $categorieDAO=new CategoriesDAO(new Connexion());
    $categories = $categorieDAO->getAllCategories();

?>
<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <h1>Liste des Categories</h1>
                            <a href="../../controllers/CategorieController.php?add=Ajouter" class="button" id="ajouter-btn">Ajouter Catégorie</a>

                            <?php count($categories) ?>
                            <table class="table no-wrap p-table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">Code Raccourci</th>
                                        <th class="border-0">Nom</th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td><?php echo $category->getCodeRaccourci(); ?></td>
                                            <td><?php echo $category->getNom(); ?></td>
                                            <td>
                                                <a href="CategorieController.php?voir=show&codeRaccourci=<?php echo $category->getCodeRaccourci() ?>" class="button">Voir</a>
                                                <a href='../controllers/CategorieController.php?codeRaccourci=<?php echo $category->getCodeRaccourci() ?>&name=modifier' class="button">Modifier</a>
                                                <a href="../../controllers/CategorieController.php?delete=supprimer&codeRaccourci=<?php echo $category->getCodeRaccourci() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie?')" class="button">Supprimer</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>