<?php
namespace Kronofire;

$router=new Router();

$routes = [
    'index'=> 'controllers/index.php',
    ''     => 'controllers/index.php',
    'about'=> 'controllers/about.php',
    'main' => 'controllers/main.php'
];
$router->define($routes);