<?php

namespace Classes\dao;

use Classes\models\Connexion;

class AdminConnexionDAO
{
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    
}
