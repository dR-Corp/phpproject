<?php

namespace Classes;

use \classes\Error;
use classes\dao\{CategoriesDAO, ContactDAO, LicencierDAO, EducationDAO};
use classes\models\{Connexion};

/**
 * class Router
 * Créer les routes et retrouver les controllers
 */

class Router {

    private $request;

    private static $rout = [];
    private $routes = [];

    public function routes() {
        return $this->routes;
    }

    public function setRoutes(array $routes) {
        $this->routes = $routes;
    }

    public static function route($route) {
        return self::$routes[$route];
    }

    public static function setRoute($url, $controller, $method, $vars = "") {
        
        // $vars correspond aux noms des variables présent dans l'url
        if(!is_string($url) || empty($url) || !is_string($controller) || empty($controller) || !is_string($method) || empty($method)) {
            // ce controllers ne doit pas concerner $vars
            echo "Les arguments doivent tous êtres des chaînes de caractères non vides !";
            // throw new InvalidArgumentException("Les arguments doivent tous êtres des chaînes de caractères non vides !", 1);
        }
        self::$rout[] = [
            "url" => $url,
            "controller" => $controller,
            "method" => $method,
            "vars" => $vars
        ];
    }

    public function __construct($request = null) {
        $this->request = $request;
        $this->routes = self::$rout;
    }

    // public function getRoute() {
    //     $elements = explode('/', $this->request);
    //     return $elements[0];
    // }

    public function getParams($url) {

        $params = null;

        // extract GET params
        $elements = explode('/', $this->request);
        unset($elements[0]);
        
        for($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = htmlspecialchars($elements[$i+1]);
            $i++;
        }

        // extract POST params
        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $val;
            }
        }

        // $matches = preg_match('`^'.$this->request.'$`', $url, $matches);

        // echo '<pre>'; print_r($elements);
        // echo '<pre>'; print_r($this->request);
        // echo '<pre>'; print_r($url);
        // echo '<pre>'; print_r($matches); exit;

        return $params;
    }

    public function match($url) {
        if(preg_match('`^'.$url.'$`', $this->request, $matches))
            return $matches;
        else
            return false;
    }

    public function renderController() {

        $matched = false;

        // $licencierDAO = new LicencierDAO(new Connexion);
        // $categorieDAO = new CategoriesDAO(new Connexion);
        // $contactDAO = new ContactDAO(new Connexion);
        // $educateurDAO = new EducationDAO(new Connexion);

        $daos = [
            "licencierDAO" => new LicencierDAO(new Connexion),
            "categoriesDAO" => new CategoriesDAO(new Connexion),
            "contactDAO" => new ContactDAO(new Connexion),
            "educateurDAO" => new EducationDAO(new Connexion),
        ];

        foreach($this->routes as $route) {
            if(($varsValues = $this->match($route["url"])) !== false) {
                $matched = true;
                $params = null;
                if($route["vars"] != "") {
                    // echo '<pre>'; print_r($route);
                    // echo '<pre>'; print_r($varsValues);
                    $varNames = explode(',', $route['vars']);
                    foreach($varsValues as $key => $value) {
                        // La première valeur contient entièrement la chaine capturée donc on fera un $key-1
                        if($key !== 0) {
                            $params[$varNames[$key - 1]] = htmlspecialchars($value);
                        }
                    }
                    // echo '<pre>'; print_r($params);                    
                }
                $controller = '\\controllers\\' . $route["controller"];
                $method = $route["method"];
                // $currentController = new $controller($licencierDAO, $contactDAO, $categorieDAO);
                $currentController = new $controller($daos);
                $currentController->$method($params);
            }
        }
        
        // exit;
        
        // if(key_exists($route, $this->routes)) {

        //     $params = $this->getParams($route);
            
        //     $controller = $this->routes[$route]['controller'];
        //     $method = $this->routes[$route]['method'];

        //     $currentController = new $controller();
        //     $currentController->$method($params);
        // }

        if(!$matched) {
            $error404 = new Error('404');
            $error404->render();
        }
    }

    public function redirect($request) {
        if(key_exists($request, $this->routes)) { 
            header("Location: ".HOST.$request);
            exit;
        }
    }


}