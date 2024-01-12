<?php
    require_once(__DIR__ . '/../config/config.php');
    require_once(__DIR__ . '/../classes/models/Connexion.php');
    require_once(__DIR__ . "/../classes/dao/ContactDAO.php");
    require_once(__DIR__ . "/../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../classes/dao/LicencierDAO.php");
    require_once(__DIR__ . "/../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../classes/models/ContactModel.php');
    require_once(__DIR__ . '/../views/header.php');
    use Classes\models\Connexion;
    use Classes\dao\ContactDAO;
    use Classes\dao\CategoriesDAO;
    use Classes\dao\LicencierDAO;

    $contactDAO=new ContactDAO(new Connexion());
    $categorieDAO=new CategoriesDAO(new Connexion());
    $licencierDAO=new LicencierDAO(new Connexion());
    $contacts = $contactDAO->getAll();
    $categories = $categorieDAO->getAllCategories();
    $licenciers = $licencierDAO->getAllLicencier();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Détails du Contact</h1>
    <?php
    $contactDAO=new ContactDAO(new Connexion());
    $contact = $contactDAO->getById( $_GET['id']) ;
    ?>
    <a href="HomeController.php">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <p><strong>Nom :</strong> <?php echo $contact['nom']; ?></p>
        <p><strong>Prénom :</strong> <?php echo $contact['prenom']; ?></p>
        <p><strong>Email :</strong> <?php echo $contact['email']; ?></p>
        <p><strong>Téléphone :</strong> <?php echo $contact['tel']; ?></p>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>

