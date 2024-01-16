<?php

namespace Classes;

use classes\View;

/**
 * class Login
 * handle les vue de la page de connexion
 */

 class Login extends View {

    public function render($params = array()) {

        extract($params);

        $pageContent = $this->pageContent;

        extract($params);

        include_once('views/admin/connexion.php');

    }

}

