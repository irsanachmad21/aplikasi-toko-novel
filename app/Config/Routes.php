<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'NovelController::index');
// $routes->get('/NovelController/(:segment)', 'NovelController::detail/$1');
// $routes->post('/', 'NovelController::index');
// $routes->get('/NovelController/create', 'NovelController::create');

// $routes->get('/', 'NovelController::index'); // Rute utama
// $routes->post('/', 'NovelController::index'); // Rute utama untuk post

$routes->get('/loginview', 'UserController::index'); // Default route to loginview
$routes->get('/adminview', 'NovelController::index');
$routes->get('/customerview', 'NovelController::customerview');


$routes->get('/', 'UserController::index'); // Rute untuk GET
$routes->post('/', 'UserController::index'); // Rute untuk POST
$routes->post('UserController/auth', 'UserController::auth');
$routes->get('/UserController/logout', 'UserController::logout');


$routes->get('/novelcontroller/index', 'NovelController::index'); // Rute untuk GET
$routes->post('/novelcontroller/index', 'NovelController::index'); // Rute untuk POST
$routes->get('/NovelController/create', 'NovelController::create'); // Rute untuk create
$routes->get('/NovelController/edit/(:segment)', 'NovelController::edit/$1'); // Rute untuk edit
$routes->delete('/NovelController/(:num)', 'NovelController::delete/$1'); // Rute untuk delete
$routes->get('/NovelController/(:any)', 'NovelController::detail/$1'); // Rute untuk detail dengan segment
$routes->post('/NovelController/save', 'NovelController::save'); // Rute untuk save
$routes->post('/NovelController/update/(:num)', 'NovelController::update/$1'); // Rute untuk update
$routes->get('/novelcontroller/customerview', 'NovelController::customerview'); // Rute untuk GET
$routes->post('/novelcontroller/customerview', 'NovelController::customerview'); // Rute untuk POST

$routes->get('/NovelController/cart', 'NovelController::cart'); // Rute untuk cart
