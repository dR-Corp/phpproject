<?php

namespace Classes;

/**
 * class view
 * pour appeler les classes
 */

 class View {

    protected $pageContent;
    
    public function __construct($pageContent = null) {
        $this->pageContent = $pageContent;
    }

    public function render($params = array()) {

        extract($params); 

        $pageContent = $this->pageContent;
        
        ob_start();
        include('views/'.$pageContent.'.php');
        $contentPage = ob_get_clean();

        extract($params);

        include_once('views/layout.php');

    }
    
    public function redirect($route) {

        // $host = $_SERVER['HTTP_HOST'];
        // // define('HOST', 'http://'.$host.'/phpproject/');
        // define('HOST', 'http://'.$host);

        header("Location: ".HOST.$route);
        exit;
    }

}

