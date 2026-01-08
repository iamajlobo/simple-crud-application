<?php
include_once 'autoload.php';
include_once 'ErrorHandler.php';

spl_autoload_register('myAutoloader');
set_exception_handler('ErrorHandler::handleException');
set_error_handler('ErrorHandler::handleError');

$router = new Router();

//Get Frontends
$router->get('/','StudentController|index');
$router->get('/add','StudentController|index');
$router->get('/update','StudentController|current');
$router->get('/view','StudentController|show');

$router->post('/api/students','StudentController|store');
$router->post('/delete/{id}','StudentController|destroy');
$router->post('/api/students/{id}','StudentController|update');

$router->dispatch();