<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\News::class, 'index']);
$routes->get('news', [\App\Controllers\News::class, 'index']);
$routes->get('news/create', [\App\controllers\News::class, 'create']);
$routes->post('news', [\App\Controllers\News::class, 'store']);
$routes->get('news/(:segment)',[\App\Controllers\News::class, 'show']);

$routes->get('pages', [\App\Controllers\Pages::class, 'index']);
$routes->get('(:segment)', [\App\Controllers\Pages::class, 'view']);

$routes->get('auth/login',[\App\Controllers\AuthController::class, 'index']);
$routes->post('auth/login',[\App\Controllers\AuthController::class, 'authenticate']);