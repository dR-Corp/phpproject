
<?php

require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../classes/models/Connexion.php');
require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
require_once(__DIR__ . "/../../classes/dao/LicencierDAO.php");
require_once(__DIR__ . "/../../classes/dao/ContactDAO.php");
require_once(__DIR__ . "/../../classes/models/LicencierModel.php");
require_once(__DIR__ . '/../../classes/models/CategorieModel.php');
require_once(__DIR__ . '/../../classes/models/ContactModel.php');
require_once(__DIR__ . '/../header.php');


    use Classes\models\Connexion;
    use Classes\dao\CategoriesDAO;
    use Classes\dao\ContactDAO;
    use Classes\dao\LicencierDAO;

    $contactDAO=new ContactDAO(new Connexion());
    $categorieDAO=new CategoriesDAO(new Connexion());
    $licencierDAO=new LicencierDAO(new Connexion());

    $categories = $categorieDAO->getAllCategories();
    $licencier = $licencierDAO->getByNumeroLicencier($_GET['numeroLicencier']);


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
                        <a href="../../controllers/LicencierController.php">Retour à la liste des licenciés</a>
                        <form method="post" action="../../controllers/LicencierController.php">
                            <label for="nomLicencier">Nom du Licencier :</label>
                            <input type="text" id="nomLicencier" name="nomLicencier" value="<?php echo $licencier['nomLicencier']; ?>" required><br>

                            <label for="prenomLicencier">Prénom du Licencier :</label>
                            <input type="text" id="prenomLicencier" name="prenomLicencier" value="<?php echo $licencier['prenomLicencier']; ?>" required><br>

                            <label for="nomc">Nom du Contact :</label>
                            <input type="nomc" id="nomc" name="nomc"  value="<?php echo $licencier['contactID'].['nomc']; ?>" required><br>

                            <label for="prenomc">Prénom du Contact :</label>
                            <input type="texte" id="prenomc" name="prenomc"  value="<?php echo $licencier['contactID'].['prenomc']; ?>" required><br>

                            <label for="email">Email du Contact :</label>
                            <input type="email" id="email" name="email"  value="<?php echo $licencier['contactID '].['email']; ?>" required><br>

                            <label for="tel">Téléphone du Contact :</label>
                            <input type="tel" id="tel" name="tel"  value="<?php echo $licencier['contactID'].['tel']; ?>" required><br>
                            <label for=" categorieCodeRaccourci ">Catégorie :</label>
                            <select name="categorieCodeRaccourci">
                                <?php foreach ($categories as $categorie): ?>
                                    <option value="<?php echo $categorie->getCodeRaccourci(); ?>">
                                        <?php echo $categorie->getNom(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br>
                            <input type="text" name="numeroLicence" value="<?php echo $licencier['numeroLicence']; ?>" hidden=true>

                            <input type="submit" name="modify" value="Modifier">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>