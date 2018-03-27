<?php
namespace Kronofire;

require './core/bootstrap.php';

$router = new Router();

require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'],'/');
$uri = str_replace("/",'',$uri);

require $router->direct($uri);


