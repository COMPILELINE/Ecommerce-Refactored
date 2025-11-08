
<?php

namespace Config;

use CodeIgniter\Routing\Router;

$routes = Services::routes();

$routes->group('', ['namespace' => 'App\Controllers\Web'], static function($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('product/(:segment)', 'ProductController::detail/$1');
    $routes->get('cart', 'CartController::index');
    $routes->post('cart/add', 'CartController::add');
    $routes->post('cart/remove', 'CartController::remove');
    $routes->match(['get','post'], 'checkout', 'CheckoutController::index');
});

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api\v1'], static function($routes) {
    $routes->post('auth/login', 'AuthApi::login');
    $routes->get('products', 'ProductsApi::list');
    $routes->post('cart/add', 'CartApi::add');
    $routes->post('orders', 'OrdersApi::create');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function($routes) {
    $routes->get('/', 'DashboardController::index');
});
