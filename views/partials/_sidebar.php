<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    
    $request = "/".$_GET['r'];

    use classes\models\Connexion;
    use classes\dao\{ContactDAO, CategoriesDAO, LicencierDAO, EducationDAO};

    $licencierDAO=new LicencierDAO(new Connexion());
    $educateurDAO=new EducationDAO(new Connexion());
    $categorieDAO=new CategoriesDAO(new Connexion());
    $contactDAO=new ContactDAO(new Connexion());

    $licenciers = $licencierDAO->getAllLicencier();
    $educateurs = $educateurDAO->getAllEducateur();
    $categories = $categorieDAO->getAllCategories();
    $contacts = $contactDAO->getAll();

?>

<div class="sidebar" style="background-color: #19233e;">

    <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-1 <?php if($request == '/home' || $request == '/') echo 'menu-open' ?>">
            <a href="home" class="nav-link font-weight-bold <?php  if($request == '/home' || $request == '/') echo 'active'  ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>Espace d'accueil</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($request == '/licencier') echo 'menu-open' ?>">
            <a href="licencier" class="nav-link font-weight-bold <?php if($request == '/licencier') echo 'active' ?>">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Licencier <span class="badge badge-info right"><?= count($licenciers) ?></span></p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/educateur') echo 'menu-open' ?>">
            <a href="educateur" class="nav-link font-weight-bold <?php if($request == '/educateur') echo 'active' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>Educateur <span class="badge badge-info right"><?= count($educateurs) ?></span></p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/categorie') echo 'menu-open' ?>">
            <a href="categorie" class="nav-link font-weight-bold <?php if($request == '/categorie') echo 'active' ?>">
                <i class="nav-icon fas fa-sitemap"></i>
                <p>Catégorie <span class="badge badge-info right"><?= count($categories) ?></span></p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($request == '/contact') echo 'menu-open' ?>">
            <a href="contact" class="nav-link font-weight-bold <?php if($request == '/contact') echo 'active' ?>">
                <i class="nav-icon fas fa-address-card"></i>
                <p>Contact <span class="badge badge-info right"><?= count($contacts) ?></span></p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
    </nav>
        
</div>

<script>
    $(function () {
        
    })
</script>