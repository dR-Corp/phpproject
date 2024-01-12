
<?php

    require_once(__DIR__ . '/../../config/config.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/educateurDAO.php");
    require_once(__DIR__ . "/../../classes/dao/AdminConnexionDAO.php");
    require_once(__DIR__ . "/../../classes/models/EducateurModel.php");
    require_once(__DIR__ . '/../header.php');

    
    use Classes\models\Connexion;
    use Classes\dao\EducationDAO;

    $admin=new EducationDAO(new Connexion());
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
                            <label for="pseudo">Email :</label>
                            <input type="pseudo" id="pseudo" name="pseudo" required><br>

                            <label for="password">Mot de pass :</label>
                            <input type="password" id="password" name="password" required><br>

                            <input type="submit" name="connexion" value="Connexion">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>