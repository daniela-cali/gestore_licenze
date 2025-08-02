<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('db', function($routes) {
    $routes->get('/', 'DatabaseInfo::index');
    $routes->get('info', 'DatabaseInfo::info'); 
});