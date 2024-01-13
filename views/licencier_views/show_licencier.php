<?php
    require_once(__DIR__ . '/../../config/database.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/ContactDAO.php");
    require_once(__DIR__ . "/../../classes/dao/CategoriesDAO.php");
    require_once(__DIR__ . "/../../classes/dao/LicencierDAO.php");
    require_once(__DIR__ . "/../../classes/models/LicencierModel.php");
    require_once(__DIR__ . '/../../classes/models/ContactModel.php');
    require_once(__DIR__ . '/../header.php');
    use Classes\models\Connexion;
    use Classes\dao\ContactDAO;
    use Classes\dao\CategoriesDAO;
    use Classes\dao\LicencierDAO;

    $contactDAO=new ContactDAO(new Connexion());
    $categorieDAO=new CategoriesDAO(new Connexion());
    $licencierDAO=new LicencierDAO(new Connexion());
    $licenciers = $licencierDAO->getAllLicencier();

?>
<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <h1>Liste des Licenciers</h1>
                        <a href="../../views/licencier_views/add_licencier.php" class="button" id="ajouter-btn">Ajouter</a>
                        <?php echo count($licenciers) ?>
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Nom</th>
                                    <th class="border-0">Prenom</th>
                                    <th class="border-0">Contact</th>
                                    <th class="border-0">Categorie du Licencier</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($licenciers as $licencier) : ?>
                                    <tr>
                                        <td><?php echo $licencier->getNom(); ?></td>
                                        <td><?php echo $licencier->getPrenom(); ?></td>
                                        <td><?php echo $licencier->getContactId(); ?></td>
                                        <td><?php echo $licencier->getCategorie(); ?></td>
                                        <td>
                                            <a href="../../controllers/LicencierController.php?voir=show&numeroLicence=<?php echo $licencier->getNumeroLicence() ?>" class="button">Voir</a>
                                            <a href='../../controllers/ContactController.php?numeroLicence=<?php echo $licencier->getNumeroLicence() ?>&name=modifier' class="button">Modifier</a>
                                            <a href="../../controllers/LicencierController.php?delete=supprimer&numeroLicence=<?php echo $licencier->getNumeroLicence() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce licencier?')" class="button">Supprimer</a>
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