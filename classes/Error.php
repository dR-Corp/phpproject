<?php

namespace Classes;

/**
 * class Error
 * handle les vue des pages d'erreur
 */

 class Error {

    protected $pageContent;
    
    public function __construct($pageContent = null) {
        $this->pageContent = $pageContent;
    }

    public function render($params = array()) {

        extract($params); 

        $pageContent = $this->pageContent;

        extract($params);

        if($pageContent == "404"):
            include_once('views/404.php');
        else:
            include_once('views/500.php');
        endif;

    }
    
    public function redirect($route) {

        $host = $_SERVER['HTTP_HOST'];
        // define('HOST', 'http://'.$host.'/phpproject/');
        define('HOST', 'http://'.$host);

        header("Location: ".HOST.$route);
        exit;
    }

}

