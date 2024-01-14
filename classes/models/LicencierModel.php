<?php

namespace Classes\models;

use Exception;

class LicencierModel
{
    private $numeroLicence;
    private $nom;
    private $prenom;
    
    private $contactId;// Instance de la classe Contact
    private $categorie; // Instance de la classe Contact

    // Constructeur
    public function __construct($numeroLicencier,$nom = null, $prenom = null , $contactId = null, $categorie = null) {
        
        $this->numeroLicence = $numeroLicencier;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contactId = $contactId;
        $this->categorie = $categorie;
    }

    // La fonction n'a pas été utilisée
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . ucfirst($attribut);
            if (is_callable(array($this, $methode))) {
                $this->$methode($valeur);
            }
        }
    }

    // Getters
    public function getNumeroLicence() {
        return $this->numeroLicence;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    

    // Setters
    public function setNumeroLicence($numeroLicence) {
        $this->numeroLicence = $numeroLicence;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of contactId
     */ 
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set the value of contactId
     *
     * @return  self
     */ 
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;

        return $this;
    }
}
