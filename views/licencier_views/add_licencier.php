
<?php

    require_once(__DIR__ . '/../../config/database.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../../classes/models/CategorieModel.php');
    require_once(__DIR__ . '/../header.php');

    use Classes\models\Connexion;
    use Classes\dao\CategoriesDAO;

    $categorieDAO=new CategoriesDAO(new Connexion());
    $categories = $categorieDAO->getAllCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <h1>Ajouter un Licencié</h1>
                        <form method="post" action="../../controllers/LicencierController.php">
                            <label for="nomLicencier">Nom du Licencier :</label>
                            <input type="text" id="nomLicencier" name="nomLicencier" required><br>
                            
                            <label for="prenomLicencier">Prénom du Licencier :</label>
                            <input type="text" id="prenomLicencier" name="prenomLicencier" required><br>

                            <label for="nomc">Nom du Contact :</label>
                            <input type="text" id="nomc" name="nomc" required><br>

                            <label for="prenomc">Prénom du Contact :</label>
                            <input type="text" id="prenomc" name="prenomc" required><br>

                            <label for="email">Email du Contact :</label>
                            <input type="email" id="email" name="email" required><br>

                            <label for="tel">Téléphone du Contact :</label>
                            <input type="text" id="tel" name="tel" required><br>

                            <label for="categorieCodeRaccourci">Catégorie :</label>
                            <select type="text" name="categorieCodeRaccourci">
                                <?php foreach ($categories as $categorie): ?>
                                    <option value="<?php echo $categorie->getCodeRaccourci(); ?>">
                                        <?php echo $categorie->getNom(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br>
                            <input type="submit" name="addLicencier" value="Ajouter">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>