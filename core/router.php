<?php
namespace Kronofire;


class Router{
    static protected $routerRoutes=[];

    public function define($routes){
        Router::$routerRoutes = $routes;
    }
    public function direct($uri){
        if(array_key_exists($uri,Router::$routerRoutes)){
            return Router::$routerRoutes[$uri];
        }else{
            return 'controllers/index.php';
        }
//        throw new \Exception('No route defined for this URI');
    }
}