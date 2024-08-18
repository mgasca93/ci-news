<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('news', [\App\Controllers\News::class, 'index']);
$routes->get('news/(:segment)',[\App\Controllers\News::class, 'show']);

$routes->get('pages', [\App\Controllers\Pages::class, 'index']);
$routes->get('(:segment)', [\App\Controllers\Pages::class, 'view']);
