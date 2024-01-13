<?php

namespace Classes\models;
use Classes\models\LicencierModel;


require_once(__DIR__ . '/../../config/database.php');
require_once(__DIR__ . '/../../classes/models/Connexion.php');
require_once(__DIR__ . "/../../classes/models/LicencierModel.php");

class EducateurModel extends LicencierModel {
    private $id;
    private $numeroLicence;
    private $email;
    private $mdp;
    private $estAdmin;
    // Constructeur

    public function __construct($id , $numeroLicence, $email, $mdp,$estAdmin=false) {
        parent::__construct($numeroLicence);  
        $this->numeroLicence= $numeroLicence;
        $this->id = $id;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->estAdmin = $estAdmin;
    }

    // Getters
    public function getEmail() {
        return $this->email;
    }

    public function getMdp() {
        return $this->mdp;
    }
    public function getEstAdmin() { 
        return $this->estAdmin;
    }
    // Setters
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setEstAdmin($estAdmin) {
        $this->estAdmin = $estAdmin;
    }
    

    /**
     * Get the value of numeroLicence
     */ 
    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    /**
     * Set the value of numeroLicence
     *
     * @return  self
     */ 
    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
