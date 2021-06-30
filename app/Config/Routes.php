<?php

namespace Config;

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* Backend */
$routes->get('/', 'Backend\Home::index', ['filter' => 'auth']);
$routes->get('profile', 'Backend\Profile::index', ['filter' => 'auth']);
$routes->get('kmd2021', 'Frontend\Home::index', ['filter' => 'auth']);
$routes->group('scan', ['filter' => 'auth'], function($routes)
{
	$routes->get('/', 'Frontend\Scan::index');
});

$routes->group('user', ['filter' => 'auth'], function($routes)
{
	$routes->get('/', 'Backend\User::index');
	$routes->get('(:num)', 'Backend\User::index/$1');
	$routes->get('create', 'Backend\User::create');
	$routes->get('search', 'Backend\User::search');
	$routes->get('edit/(:num)', 'Backend\User::edit/$1');
});

$routes->group('guest', ['filter' => 'auth'], function($routes)
{
	$routes->get('/', 'Backend\Guest::index');
	$routes->get('(:num)', 'Backend\Guest::index/$1');
	$routes->get('create', 'Backend\Guest::create');
});

$routes->get('login', 'Backend\Login::index', ['filter' => 'no-auth']);
$routes->get('forgot', 'Backend\Forgot::index', ['filter' => 'no-auth']);


/* Frontend */

/* API */
$routes->group('api', function($routes)
{
	//Default
    $routes->get('/', 'API\Api::index');

	// API Auth
    $routes->group('auth', function($routes)
    {
		$routes->get('/', 'API\Auth::index');
		$routes->add('login', 'API\Auth::login', ['filter' => 'api-no-auth']);
		$routes->post('logout', 'API\Auth::logout', ['filter' => 'api-auth']);
    });
	
	// API User
    $routes->group('user', ['filter' => 'api-auth'], function($routes)
    {
		$routes->get('/', 'API\User::index');
		$routes->get('(:num)', 'API\User::index/$1');
		$routes->post('create', 'API\User::create');
		$routes->put('edit', 'API\User::edit');
		$routes->delete('delete', 'API\User::delete');
	});
	
	// API Guest
    $routes->group('guest', ['filter' => 'api-auth'], function($routes)
    {
		$routes->post('create', 'API\Guest::create');
	});

	// API QRcode
    $routes->group('qrcode', function($routes)
    {
		$routes->post('active', 'API\QRcode::active');
		$routes->post('is-active', 'API\QRcode::isActive');
	});
	
	// API Send Mail

	$routes->get('send-email', 'API\SendMultiEmail::send');
	$routes->get('show-email', 'API\SendMultiEmail::show');
	$routes->get('fix-email', 'API\SendMultiEmail::fixed');

	
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
