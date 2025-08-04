<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');


$routes->group('db', function($routes) {
    $routes->get('/', 'DatabaseInfoController::index');
    $routes->get('info', 'DatabaseInfoController::info'); 
});



$routes->group('clienti', function($routes) {
    $routes->get('/', 'ClientiController::index');
    $routes->get('licenze', 'ClientiController::licenze');
 });