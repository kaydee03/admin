<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get','post'],'/login', 'Users::login');

$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('logout', 'Users::logout');

$routes->match(['get','post'],'register', 'Users::register',['filter' => 'auth']);
$routes->match(['get','post'],'userslist', 'Users::userslist',['filter' => 'auth']);
$routes->match(['get','post'],'createuser', 'Users::createuser',['filter' => 'auth']);
$routes->match(['get','post'],'storeuser', 'Users::storeuser',['filter' => 'auth']);
$routes->match(['get','post'],'edituser', 'Users::edituser',['filter' => 'auth']);

$routes->match(['get','post'],'admin', 'Users::admin',['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index',['filter' => 'auth']);

// $routes->match(['get','post'],'dispatchboard', 'Dispatchers::dispatchboard',['filter' => 'auth']);
// $routes->match(['get','post'],'empinfo', 'EmpInfo::empinfo',['filter' => 'auth']);
// $routes->match(['get','post'],'equipment', 'Equipment::equipment',['filter' => 'auth']);
// $routes->match(['get','post'],'compinfo', 'CompInfo::index',['filter' => 'auth']);

$routes->match(['get','post'],'test', 'Users::test',['filter' => 'auth']);





/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
