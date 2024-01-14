<?php

use \classes\Router;

// CONNEXION
Router::setRoute("/login", "HomeController", "login");
Router::setRoute("/log", "HomeController", "log");
Router::setRoute("/logout", "HomeController", "logout");

// ESPACE D'ACCUEIL
Router::setRoute("/", "HomeController", "index");
Router::setRoute("/home", "HomeController", "index");

// LICENCIER
Router::setRoute("/licencier", "LicencierController", "index");
Router::setRoute("/add-licencier", "LicencierController", "add");
Router::setRoute("/edit-licencier-([0-9]+)", "LicencierController", "edit", "id");
Router::setRoute("/create-licencier", "LicencierController", "create");
Router::setRoute("/update-licencier-([0-9]+)-([0-9]+)", "LicencierController", "update", "id,contactID");
Router::setRoute("/delete-licencier-([0-9]+)-([0-9]+)", "LicencierController", "delete", "id,contactID");

// EDUCATEUR
Router::setRoute("/educateur", "EducateurController", "index");
Router::setRoute("/add-educateur", "EducateurController", "add");
Router::setRoute("/edit-educateur-([0-9]+)", "EducateurController", "edit", "id");
Router::setRoute("/create-educateur", "EducateurController", "create");
Router::setRoute("/update-educateur-([0-9]+)", "EducateurController", "update", "id");
Router::setRoute("/delete-educateur-([0-9]+)", "EducateurController", "delete", "id");

// CATEGORIE
Router::setRoute("/categorie", "CategorieController", "index");
Router::setRoute("/add-categorie", "CategorieController", "add");
Router::setRoute("/edit-categorie-(.+)", "CategorieController", "edit", "id");
Router::setRoute("/create-categorie", "CategorieController", "create");
Router::setRoute("/update-categorie-(.+)", "CategorieController", "update", "id");
Router::setRoute("/delete-categorie-(.+)", "CategorieController", "delete", "id");

// CONTACT
Router::setRoute("/contact", "ContactController", "index");
Router::setRoute("/add-contact", "ContactController", "add");
Router::setRoute("/edit-contact-([0-9]+)", "ContactController", "edit", "id");
Router::setRoute("/create-contact", "ContactController", "create");
Router::setRoute("/update-contact-([0-9]+)", "ContactController", "update", "id");
Router::setRoute("/delete-contact-([0-9]+)", "ContactController", "delete", "id");


// // Recuperation de donnees
// Router::setRoute("/data/(.+)", "Controller", "dataSPP", 'entity');
// // Ajout de données
// Router::setRoute("/add/(.+)", "Controller", "add", 'entity');
// // Modification de donnees
// Router::setRoute("/edit/(.+)/([0-9]+)", "Controller", "edit", 'entity,id');
// // Suppression de donnees
// Router::setRoute("/del/(.+)/([0-9]+)", "Controller", "del", 'entity,id');
// // Filtre de donnees
// Router::setRoute("/filter/(.+)/(.+)/([0-9]*)", "Controller", "filter", 'entity,foreign_key,filter_id');
