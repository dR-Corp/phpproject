<?php
    require_once(__DIR__ . '/../../config/database.php');
    require_once(__DIR__ . '/../../classes/models/Connexion.php');
    require_once(__DIR__ . "/../../classes/dao/ContactDAO.php");
    require_once(__DIR__ . '/../../classes/models/ContactModel.php');
    require_once(__DIR__ . '/../header.php');
 
    use Classes\models\Connexion;
    use Classes\dao\ContactDAO;

    $contactDAO=new ContactDAO(new Connexion());
    $contacts = $contactDAO->getAll();

?>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <!--<a href="../../controllers/ContactController.php?action=Ajouter" class="button" id="ajouter-btn">Ajouter</a>
-->
                    <?php count($contacts) ?>
                        <table class="table no-wrap p-table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Nom</th>
                                    <th class="border-0">Prenom</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Telephone</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact) : ?>
                                    <tr>
                                        <td><?php echo $contact->getNomc(); ?></td>
                                        <td><?php echo $contact->getPrenomc(); ?></td>
                                        <td><?php echo $contact->getEmail(); ?></td>
                                        <td><?php echo $contact->getTel(); ?></td>
                                        <!--<td>
                                            <a href="../views/view_contact.php?voir=show&id=<?php echo $contact->getId() ?>" class="button">Voir</a>
                                            <a href='../views/modify_contact.php?id=<?php echo $contact->getId() ?>&name=modifier' class="button">Modifier</a>
                                            <a href="../../controllers/ContactController.php?delete=supprimer&id=<?php echo $contact->getId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact?')" class="button">Supprimer</a>
                                        </td>-->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</body>