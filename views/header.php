<?php

    require_once(__DIR__ . '/../config/database.php');
    require_once(__DIR__ . '/../classes/models/Connexion.php');
    require_once(__DIR__ . "/../classes/dao/ContactDAO.php");
    require_once(__DIR__ . "/../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../classes/dao/LicencierDAO.php");
    require_once(__DIR__ . "/../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../classes/models/ContactModel.php');
    use Classes\models\Connexion;
    use Classes\dao\LicencierDAO;

    $licencierDAO=new LicencierDAO(new Connexion());

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="navbar">
        <a href="#">Accueil</a>
    </div>
    <div class="sidebar">
    <a href="/views/licencier_views/show_licencier.php">Licencier</a>
    <a href="/views/educateur_views/show_educateur.php">Educateur</a>
    <a href="/views/categories_views/show_categorie.php">Catégorie</a>
    <a href="/views/contact_views/show_contact.php">Contact</a>
</div>

</body>