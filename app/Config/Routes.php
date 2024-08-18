<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages', [\App\Controllers\Pages::class, 'index']);
$routes->get('(:segment)', [\App\Controllers\Pages::class, 'view']);
