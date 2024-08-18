<?php

use CodeIgniter\Router\RouteCollection;

/** 
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' =>'auth'],  static function( $routes ){
    $routes->get('news/create', [\App\controllers\News::class, 'create'], ['as' => 'news_create']);
    $routes->post('news', [\App\Controllers\News::class, 'store'], ['as' => 'news_store']);
    $routes->get('logout', [\App\Controllers\AuthController::class, 'logout'], ['as' => 'logout']);
});

$routes->get('/', [\App\Controllers\News::class, 'index'], ['as' => 'home']);
$routes->get('news', [\App\Controllers\News::class, 'index'], ['as' => 'news_list']);
$routes->get('news/(:segment)',[\App\Controllers\News::class, 'show'], ['as' => 'news_show']);


$routes->get('login',[\App\Controllers\AuthController::class, 'index'], ['as' => 'login_form']);
$routes->post('login',[\App\Controllers\AuthController::class, 'authenticate'], ['as' => 'authenticate']);
$routes->get('register', [\App\Controllers\RegisterController::class, 'index'], ['as' => 'register_form']);
$routes->post('register', [\App\Controllers\RegisterController::class, 'authenticate'], ['as' => 'register_authenticate']);

$routes->get('pages', [\App\Controllers\Pages::class, 'index']);
$routes->get('(:segment)', [\App\Controllers\Pages::class, 'view']);
