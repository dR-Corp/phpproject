<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }    
    $request = "/".$_GET['r'];1
?>

<div class="sidebar" style="background-color: #19233e;">

    <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item mt-1 <?php if($request == '/home' || $request == '/') echo 'menu-open' ?>">
            <a href="/home" class="nav-link font-weight-bold <?php  if($request == '/home' || $request == '/') echo 'active'  ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Espace d'accueil</p>
            </a>
        </li>

        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($request == '/annees') echo 'menu-open' ?>">
            <a href="/annees" class="nav-link font-weight-bold <?php if($request == '/annees') echo 'active' ?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Licencier</p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/objectifs') echo 'menu-open' ?>">
            <a href="/objectifs" class="nav-link font-weight-bold <?php if($request == '/objectifs') echo 'active' ?>">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>Educateur</p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
        <li class="nav-item mt-1 <?php if($request == '/actions') echo 'menu-open' ?>">
            <a href="/actions" class="nav-link font-weight-bold <?php if($request == '/actions') echo 'active' ?>">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>Catégorie</p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>

        <li class="nav-item mt-1 <?php if($request == '/activites') echo 'menu-open' ?>">
            <a href="/activites" class="nav-link font-weight-bold <?php if($request == '/activites') echo 'active' ?>">
                <i class="nav-icon fas fa-bars"></i>
                <p>Contact</p>
            </a>
        </li>
        
        <div class="my-1 border border-secondary ml-4"></div>
        
    </nav>
        
</div>

<script>
    $(function () {
        
    })
</script>