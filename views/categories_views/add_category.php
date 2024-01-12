
<?php
    require_once(__DIR__ . '/../header.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <h1>Ajouter une Catégorie</h1>
                        <form method="post" action="../../controllers/CategorieController.php">
                            
                            <label for="codeRaccourci">Code Raccourci :</label>
                            <input type="text" id="codeRaccourci" name="codeRaccourci" required><br>

                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required><br>
                            
                            <input type="submit" name="add" value="Ajouter">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>