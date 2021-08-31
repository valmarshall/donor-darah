<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/admin/login', 'AdminAuth::index', ['filter' => 'auth']);
$routes->get('/admin', 'AdminDashboard::index', ['filter' => 'admin']);
$routes->get('/admin/users', 'AdminUsers::index', ['filter' => 'admin']);
$routes->get('/admin/users/add', 'AdminUsers::add', ['filter' => 'admin']);
$routes->get('/admin/users/edit/(:segment)', 'AdminUsers::edit/$1', ['filter' => 'admin']);
$routes->delete('/admin/users/(:num)', 'AdminUsers::delete/$1', ['filter' => 'admin']);
$routes->get('/admin/roles', 'AdminRoles::index', ['filter' => 'admin']);
$routes->get('/admin/roles/add', 'AdminRoles::add', ['filter' => 'admin']);
$routes->get('/admin/roles/edit/(:segment)', 'AdminRoles::edit/$1', ['filter' => 'admin']);
$routes->delete('/admin/roles/(:num)', 'AdminRoles::delete/$1');
$routes->get('/admin/blood-stock', 'AdminBloodStock::index', ['filter' => 'admin']);
$routes->get('/admin/blood-stock/add', 'AdminBloodStock::add', ['filter' => 'admin']);
$routes->get('/admin/blood-stock/detail/(:segment)', 'AdminBloodStock::detail/$1', ['filter' => 'admin']);
$routes->get('/admin/blood-donor', 'AdminBloodDonor::index', ['filter' => 'admin']);
$routes->get('/admin/blood-donor/add', 'AdminBloodDonor::add', ['filter' => 'admin']);
$routes->get('/admin/blood-group', 'AdminBloodGroup::index', ['filter' => 'admin']);
$routes->get('/admin/blood-group/add', 'AdminBloodGroup::add', ['filter' => 'admin']);
$routes->get('/admin/blood-group/edit/(:segment)', 'AdminBloodGroup::edit/$1', ['filter' => 'admin']);
$routes->delete('/admin/blood-group/(:num)', 'AdminBloodGroup::delete/$1', ['filter' => 'admin']);
$routes->get('/admin/blood-needer', 'AdminBloodNeeder::index', ['filter' => 'admin']);
$routes->get('/admin/blood-needer/add', 'AdminBloodNeeder::add', ['filter' => 'admin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
