<?php
include_once 'autoload.php';
spl_autoload_register('myAutoloader');

$router = new Router();

$router->get('/','UserController|index');
$router->get('/add','UserController|index');
$router->get('/update','UserController|index');
$router->get('/view','UserController|index');



$router->dispatch();