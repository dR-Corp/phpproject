<?php
use Classes\dao\ContactDAO;
use Classes\models\Connexion;
use Classes\models\ContactModel;
require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/ContactDAO.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Modifier un Contact</h1>
    <a href="../controllers/HomeController.php">Retour à la liste des contacts</a>
    <h1>Détails du Contact</h1>
    <?php
    $contactDAO=new ContactDAO(new Connexion());
    $contact = $contactDAO->getById( $_GET['id']) ;
    
    ?> 
    <form action="../controllers/ContactController.php" method="post">

        <label for="nomc">Nom :</label>
        <input type="text" id="nomc" name="nomc" value="<?php echo $contact['nomContact']; ?>" required><br>

        <label for="prenomc">Prénom :</label>
        <input type="text" id="prenomc" name="prenomc" value="<?php echo $contact['prenomContact']; ?>" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $contact['email']; ?>" required><br>

        <label for="tel">Téléphone :</label>
        <input type="text" id="tel" name="tel" value="<?php echo $contact['tel']; ?>" required><br>
       <input type="text" name="id" value="<?php echo $contact['id']; ?>" hidden=true>


        <input type="submit" name="modify" value="Modifer">
    </form>

</body>
</html>

