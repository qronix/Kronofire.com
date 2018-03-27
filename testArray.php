<?php

$routes = [
    'index'=> 'controllers/index.php',
    ''     => 'controllers/index.php',
    'about'=> 'controllers/about.php'
];

if(array_key_exists('about',$routes)){
    echo "sure does";
}