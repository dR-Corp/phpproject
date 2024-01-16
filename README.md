# PHP PROJECT - PARTIE 1

## Architecture du projet

/assets/
/classes/
/config/
/controllers/
/views/
index.php
routes.php

## Description des fichiers et dossiers

[] /assets/
Les fichiers de styles, les script javascript et les plugins javascript.

[] /classes/

- **Les classes Models** : /classes/models/
Modèles des différentes entités mises en jeu dans le système.

- **Les classes DAO** : /classes/dao/
Gestion CRUD avec PDO

- **La classe Router** : /classes/Router.php
Gestion du système de routes, gestion des requêtes, récupération des paramètres des requêtes, exécution des actions des controllers.

- **La classe View** : /classes/Viwe.php
Gestion des Vue, rendue des pages et récupération des données transmises aux pages.

- **La classe Login** : /classes/Login.php
Gestion de la vue de la page de connexion, étends View

- **La classe Error** : /classes/Error.php
Gestion de la vue de la page de 404, étends View

[] /config/
Autoload et informations de connexion à la base de données

[] /controllers/
Les controllers des différentes entités

[] /views/
Les différentes vue du système,
/views/partials/
Des parties de pages : entête, pied de page, menu du panel de gauche
