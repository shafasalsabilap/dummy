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
$routes->get('/pembelajaran_sql/dasar', 'PembelajaranSQL::dasar'); 
$routes->get('/pembelajaran_sql/agregasi', 'PembelajaranSQL::agregasi'); 
$routes->get('/pembelajaran_sql/join', 'PembelajaranSQL::join');
$routes->get('/pembelajaran_sql/subquery', 'PembelajaranSQL::subquery');
$routes->get('/pembelajaran_sql/manipulasi', 'PembelajaranSQL::manipulasi');
$routes->get('/pembelajaran_sql/advanced', 'PembelajaranSQL::advanced');
$routes->get('/pembelajaran_sql/tambahan', 'PembelajaranSQL::tambahan');

$routes->get('/', 'Home::index', ['filter' => 'authGuard']); // Proteksi halaman Home
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/registerProcess', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

$routes->group('api', function($routes) {
    $routes->resource('polis', ['controller' => 'PolisApiController']);
});
