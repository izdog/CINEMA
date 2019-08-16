<?php

require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->get('/', function(){
    echo "HomePage !";
    $auth = new App\Auth();
    dump($auth->login('rambo', 'rambo123'));
});

$router->run();




