<?php

namespace Classes;

use classes\View;

/**
 * class Error
 * handle les vue des pages d'erreur
 */

 class Error extends View {

    public function render($params = array()) {

        extract($params); 

        $pageContent = $this->pageContent;

        extract($params);

        include_once('views/404.php');

    }
    
}