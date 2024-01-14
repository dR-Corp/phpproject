<?php

namespace Classes;

/**
 * class Login
 * handle les vue de la page de connexion
 */

 class Login {

    protected $pageContent;
    
    public function __construct($pageContent = null) {
        $this->pageContent = $pageContent;
    }

    public function render($params = array()) {

        extract($params); 

        $pageContent = $this->pageContent;

        extract($params);

        include_once('views/admin/connexion.php');

    }
    
    public function redirect($route) {

        header("Location: ".HOST.$route);
        exit;
    }

}

