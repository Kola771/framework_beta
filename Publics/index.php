<?php
//On appelle le fichier Router.php
    require "../Core/Router.php";
    require "../App/Controllers/Posts.php";
//On instancie la classe Router
    $router = new Router();
    // echo "\$router est de la classe ' " . get_class($router) . " '<br>";
    // $root = dirname(__DIR__);
    // echo $root . "/Router.php";
//Query string
    $url = $_SERVER["QUERY_STRING"];
    // echo "La chaîne de requête ==> '" . $url . "'";

//Ajout de quelques routes
    $router->add("{controller}/{action}");
    $router->add("admin/{controller}/{action}");
    $router->add("{controller}/{id:\d+}/{action}");

    $router->match($url);
    print_r($router->dispatch($url));
    // if(!empty($router->getParams())) {
    //     echo "<pre>";
    //     echo "Paramètres de la route actuelle ";
    //     var_dump($router->getParams());
    //     echo "</pre>";
    // } else {
    //     echo "<h1>Désolé la page n'a pas été trouvé</h1>";
    // }
    
    // class essai {
    //     protected $routing = [];
    //     protected $parametre = [];
    //     public function ajout($param1, $param=[]){
    //         $param1 = preg_replace("/\//", "\/", $param1);
    //         $param1 = preg_replace("/\{([a-z-]+)\}/", "(?'\\1'[a-z-]+)", $param1);
    //         $param1 = preg_replace("/\{([a-z-]+):([^\}]+)\}/", "(?'\\1'\\2)", $param1);
    //         $param1 = "/^" . $param1 . "\$/i";
    //         $this->routing[$param1] = $param;
    //     }

    //     public function match($param1) {
    //         foreach ($this->routing as $route => $param) {
    //             if(preg_match($route, $param1, $matche)) {
    //                 foreach ($matche as $key => $value) {
    //                     if(is_string($key)) {
    //                        $param[$key] = $value;
    //                     }
    //                 }
    //                 $this->parametre = $param;
    //                 return true;
    //             }
    //         }
    //         return false;
    //     }

    //     public function nom_routing() {
    //         return $this->routing;
    //     }

    //     public function nom_match() {
    //         return $this->parametre;
    //     }

    //     public function converToPascalCase($param1) {
    //         return preg_replace("/-/", "", ucwords($param1, "-"));
    //     }

    //     public function converToCamelCase($param1) {
    //         return lcfirst($this->converToPascalCase($param1));
    //     }

    //     public function dispa($addresse) {
    //         if($this->match($addresse)) {
    //             $controller = $this->parametre["controller"];
    //             $controller = $this->converToPascalCase($controller);
    
    //             if(class_exists($controller)) {
    //                 $controller_class = new $controller();
    
    //                 $action = $this->parametre["action"];
    //                 $action = $this->converToCamelCase($action);
    
    //                 if(method_exists($controller_class, $action)) {
    //                     $controller_class->$action();
    //                 } else {
    //                     echo "Cette méthode \"$action\" n'existe pas dans la classe \"$controller\".";
    //                 }
    //             } else {
    //                 echo "La classe \"$controller\" n'existe pas.";
    //             }
    //         } else {
    //             echo "Cette route \"$addresse\" n'existe pas.";
    //         }
    //     }
    // }

    // $p = new essai();
    // $p->ajout("{controller}/{action}");
    // $p->ajout("admin/{controller}/{action}");
    // $p->ajout("{controller}/{id:\d+}/{action}");
    // $p->match($url);
    // echo "<pre>";
    // var_dump($p->nom_routing());
    // var_dump($p->nom_match());
    // print_r($p->dispa($url));
    // echo "</pre>";
?>