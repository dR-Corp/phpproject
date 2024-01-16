<?php

    session_start();
    
    ini_set('display_errors','on');
    error_reporting(E_ALL);

    $host = $_SERVER['HTTP_HOST'];
    define('HOST', 'http://'.$host);
    // define('HOST', 'http://'.$host.'/phpproject/');

    use \classes\Router;    
    
    require_once('config/autoload.php');
    require_once("config/database.php");
    require_once('routes.php');

    if($_GET['r'] != "login")
        unset($_SESSION['error']);
    
    if(isset($_GET['r']) && !empty($_GET['r'])) {

        if($_GET['r'] != "home" && $_GET['r'] != "login" && $_GET['r'] != "log" && $_GET['r'] != "logout") {

            if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                $request = "/".$_GET['r'];
                $router = new Router($request);
            }
            else {
                $_SESSION['info'] = "Connectez vous pour démarrer une nouvelle session !";
                header('Location: login');
            }
        }
        else {
            $request = "/".$_GET['r'];
            $router = new Router($request);
        }
        
    }
    else {
        $request = '/home';
        $router = new Router($request);
    }
    
    $router->renderController();

?>


