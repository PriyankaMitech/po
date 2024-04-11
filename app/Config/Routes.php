<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('register','Home::register');
$routes->post('register', 'Home::register');
$routes->post('lostpassword', 'Home::lostpassword');
$routes->post('otpvalidate', 'Home::otpvalidate');
$routes->post('newpassword', 'Home::newpassword');

$routes->get('admin_dashboard','Home::admin_dashboard');



