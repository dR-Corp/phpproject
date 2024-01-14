<?php

namespace Classes\models;
use PDO;
use PDOException;

class Connexion
{
    public $pdo;
    public function __construct(){ 
        
        global $host;
        global $database;
        global $username;
        global $password;
        // Connexion à la base de données en utilisant PDO
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Erreur de connexion à la base de données : " . $e->getMessage());
        }

    }
}