<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');


$routes->group('database', function($routes) {
    $routes->get('/', 'DatabaseInfoController::index');
    $routes->get('info', 'DatabaseInfoController::info'); 
    $routes->get('fields/(:segment)', 'DatabaseInfoController::getTableFields/$1');
});



$routes->group('clienti', function($routes) {
    $routes->get('/', 'ClientiController::index');
    $routes->get('scheda_cliente/(:num)', 'ClientiController::schedaCliente/$1');
 });

$routes->group('licenze', function($routes) {
    $routes->get('/', 'LicenzeController::index');
    $routes->get('crea/(:num)', 'LicenzeController::crea');
    $routes->get('nuova/(:num)', 'LicenzeController::crea/$1'); // Nuova licenza per IDCliente
    $routes->post('salva', 'LicenzeController::salva'); 
    $routes->get('modifica/(:num)', 'LicenzeController::modifica/$1');
    $routes->post('modifica/(:num)', 'LicenzeController::modifica/$1');
    $routes->get('elimina/(:num)', 'LicenzeController::elimina/$1');
    $routes->get('visualizza/(:num)', 'LicenzeController::visualizza/$1');
    // routes
    
});

$routes->group('api', function($routes) {
    $routes->get('aggiornamenti/licenza/(:num)', 'AggiornamentiController::jsonByLicenza/$1');
    

 });