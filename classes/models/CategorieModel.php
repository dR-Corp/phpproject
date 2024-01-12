<?php

namespace Classes\models;

class CategorieModel
{
    protected $codeRaccourci; 
    protected $nom;

    public function __construct($codeRaccourci , $nom=null)
    {
        $this->codeRaccourci = $codeRaccourci;
        $this->nom=$nom;
    }

    /**
     * Get the value of codeRaccourci
     */ 
    public function getCodeRaccourci()
    {
        return $this->codeRaccourci;
    }

    /**
     * Set the value of codeRaccourci
     *
     * @return  self
     */ 
    public function setCodeRaccourci($codeRaccourci)
    {
        $this->codeRaccourci = $codeRaccourci;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}
