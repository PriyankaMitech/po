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

$routes->get('logout','Home::logout');

$routes->get('delete/(:any)/(:any)','Home::delete/$1');

$routes->get('admin_dashboard','Home::admin_dashboard');

$routes->get('tax','Home::tax');
$routes->post('tax','Home::tax');
$routes->get('edit-tax/(:any)','Home::tax/$1');
$routes->post('edit-tax/(:any)','Home::tax/$1');

$routes->get('vendor_type','Home::vendor_type');
$routes->post('vendor_type','Home::vendor_type');
$routes->get('edit-vendor-type/(:any)','Home::vendor_type/$1');
$routes->post('edit-vendor-type/(:any)','Home::vendor_type/$1');

$routes->get('menu','Home::menu');
$routes->post('menu','Home::menu');
$routes->get('edit-menu/(:any)','Home::menu/$1');
$routes->post('edit-menu/(:any)','Home::menu/$1');

$routes->get('user','Home::user');
$routes->post('user','Home::user');
$routes->get('edit-user/(:any)','Home::user/$1');
$routes->post('edit-user/(:any)','Home::user/$1');
$routes->get('user-list','Home::get_user_list');

$routes->get('add-vendor','Home::vendor');
$routes->post('add-vendor','Home::vendor');
$routes->get('edit-vendor/(:any)','Home::vendor/$1');
$routes->post('edit-vendor/(:any)','Home::vendor/$1');
$routes->get('vendor-list','Home::get_vendor_list');

$routes->post('get_state_name_location','Home::get_state_name_location');
$routes->post('get_city_name_location','Home::get_city_name_location');









