<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Story::index');
$routes->get('/read/(:num)', 'Story::read/$1');
$routes->get('/search', 'Story::search');

$routes->group('admin', function($routes) {

    $routes->get('/', 'Admin::index');

    $routes->post('store', 'Admin::store');

    $routes->get('edit/(:num)', 'Admin::index/$1');

    $routes->post('update/(:num)', 'Admin::update/$1');

    $routes->get('delete/(:num)', 'Admin::delete/$1');
});