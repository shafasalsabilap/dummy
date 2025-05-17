<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/polis', 'PolisController::index');
$routes->get('/polis/create', 'PolisController::create');
$routes->post('/polis/store', 'PolisController::store');
$routes->get('polis/edit/(:segment)', 'PolisController::edit/$1');  // Rute untuk menampilkan form edit
$routes->post('polis/update/(:segment)', 'PolisController::update/$1');  // Rute untuk memperbarui data
$routes->get('polis/delete/(:segment)', 'PolisController::delete/$1');