<?php
    require_once(__DIR__ . '/../../config/database.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/ContactDAO.php");
    require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../../classes/dao/LicencierDAO.php");
    require_once(__DIR__ . "/../../classes/dao/EducationDAO.php");
    require_once(__DIR__ . "/../../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../../classes/models/ContactModel.php');
    require_once(__DIR__ . '/../../classes/models/EducateurModel.php');
    require_once(__DIR__ . '/../header.php');
    use Classes\models\Connexion;
    use Classes\dao\ContactDAO;
    use Classes\dao\CategoriesDAO;
    use Classes\dao\EducationDAO;
    use Classes\dao\LicencierDAO;

    $contactDAO=new ContactDAO(new Connexion());
    $categorieDAO=new CategoriesDAO(new Connexion());
    $licencierDAO=new LicencierDAO(new Connexion());
    $educateurDAO=new EducationDAO(new Connexion());

    $educateurs = $educateurDAO->getAllEducateur();

?>
<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <h1>Liste des Educateurs</h1>
                        <a href="../../views/educateur_views/add_educateur.php" class="button" id="ajouter-btn">Ajouter</a>
                        <?php count($educateurs) ?>
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Licencié</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Admin</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($educateurs as $educateur) : ?>
                                    <tr>
                                        <td><?php echo $educateur->getNumeroLicence(); ?></td>
                                        <td><?php echo $educateur->getEmail(); ?></td>
                                        <td><?php echo $educateur->getEstAdmin(); ?></td>
                                        <td>
                                            <a href="../../controllers/EducateurController.php?voir=show&id=<?php echo $educateur->getId() ?>" class="button">Voir</a>
                                            <a href='../../controllers/EducateurController.php?id=<?php echo $educateur->getId() ?>&name=modifier' class="button">Modifier</a>
                                            <a href="../../controllers/EducateurController.php?delete=supprimer&id=<?php echo $educateur->getId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce licencier?')" class="button">Supprimer</a>
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
</body>