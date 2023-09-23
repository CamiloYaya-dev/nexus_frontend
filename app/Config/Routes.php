<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::index');
$routes->get('users', 'UserController::index'); // Obtener usuarios
$routes->get('user/show/(:num)', 'UserController::show/$1'); // Obtener usuario por ID
$routes->post('user/create', 'UserController::create'); // Crear un usuario
$routes->put('user/update/(:num)', 'UserController::update/$1'); // Editar usuario por ID
$routes->delete('user/delete/(:num)', 'UserController::delete/$1'); // Eliminar usuario por ID
