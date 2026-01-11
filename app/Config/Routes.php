<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Home::dashboard');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

$routes->get('api/dashboard-stats', 'Home::getDashboardStats');
$routes->get('api/location-data', 'Lokasi::getLocationData');
$routes->get('test-map', 'Lokasi::testMap');

