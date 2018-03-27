<?php
namespace Kronofire;

$router=new Router();

$routes = [
    'index'=> 'controllers/index.php',
    ''     => 'controllers/index.php',
    'about'=> 'controllers/about.php',
    'test' => 'testArray.php'
];
$router->define($routes);