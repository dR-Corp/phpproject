<?php

    session_start();
    
    ini_set('display_errors','on');
    error_reporting(E_ALL);

    $host = $_SERVER['HTTP_HOST'];
    // define('HOST', 'http://'.$host.'/phpproject/');
    define('HOST', 'http://'.$host);

    use \classes\Router;    
    
    require_once('config/autoload.php');
    require_once('routes.php');
    
    // print_r($_GET);
    
    if(isset($_GET['r'])) {
        $request = "/".$_GET['r'];
        $router = new Router($request);
    }
    else {
        $request = $redirect = '/home';
        $router = new Router($request);
        $router->redirect($redirect, $request);
    }
    
    $router->renderController();

    // header("Location: controllers/HomeController.php");
    // header("Location: controllers/AdminController.php");
    //erreor reporting
//init_set('dyspl')
?>


