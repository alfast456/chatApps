<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('messages/(:num)/(:num)', 'ChatController::getMessages/$1/$2');
$routes->get('/chat', 'ChatController::chat', ['filter' => 'auth']);
$routes->post('/messages', 'ChatController::saveMessage');