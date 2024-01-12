
<?php

    require_once(__DIR__ . '/../../config/config.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../../classes/models/CategorieModel.php');
    require_once(__DIR__ . '/../header.php');

    use Classes\models\Connexion;
    use Classes\dao\LicencierDAO;

    $licencierDAO=new LicencierDAO(new Connexion());
    $licenciers = $licencierDAO->getAllLicencier();

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
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <h1>Ajouter un Educateur</h1>
                        <form method="post" action="../../controllers/EducateurController.php">
                            <label for="licencie">Licencier :</label>
                            <select id="licencie" name="licencie" required>
                                <?php
                                    foreach ($licenciers as $licencier) {
                                        echo '<option value="' . $licencier->getNumeroLicence() . '">' . $licencier->getNom() . " ". $licencier->getPrenom(). '</option>';
                                    }
                                ?>
                            </select><br>

                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                            <br>

                            <label for="mdp">Mot de passe:</label>
                            <input type="password" name="mdp" required>
                            <br>

                            <label for="estAdmin">Est administrateur:</label>
                            <input type="checkbox" name="estAdmin">
                            <br>
                            <input type="submit" name="addEducateur" value="Ajouter">
                                                                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>