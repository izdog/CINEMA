<?php

require 'vendor/autoload.php';

define('ROOT', __DIR__);
$router = new \Bramus\Router\Router();


$router->before('GET', '/profil', function(){
    if(!isset($_SESSION['auth'])){
        header('Location: ../login');
        exit();
    }
});

$router->get('/', function(){
    echo "HomePage !";
    $auth = new App\Auth();
    dump($auth->login('rambo', 'rambo123'));
});

$router->get('/login', '\App\Controller\AuthController@show');
$router->post('/login', '\App\Controller\AuthController@login');
$router->get('/logout', '\App\Controller\AuthController@logout');

$router->get('/profil', function(){
    echo "ProfilPage !";
});

$router->run();




