<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


/*Front routes*/

$routes->get('/', 'Home::contactus');
$routes->get('contactus', 'Home::contactus');
$routes->post('security-checking', 'Home::security_checking');
$routes->get('thankyou', 'Home::contactus_thankyou');
// comman end
/* API routings end*/
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
        // LiveKit Agent Routes
        $routes->group('livekit', function($routes) {
            $routes->get('/', 'LivekitAgent::index');
            $routes->get('dashboard', 'LivekitAgent::dashboard');
            $routes->get('test', 'LivekitAgent::test');
            $routes->options('generateToken', 'LivekitAgent::options');
            $routes->post('generateToken', 'LivekitAgent::generateToken');
            $routes->post('createRoom', 'LivekitAgent::createRoom');
            $routes->get('listRooms', 'LivekitAgent::listRooms');
            $routes->post('deleteRoom', 'LivekitAgent::deleteRoom');
            $routes->get('getParticipants', 'LivekitAgent::getParticipants');
            $routes->post('muteParticipant', 'LivekitAgent::muteParticipant');
            $routes->post('disconnectParticipant', 'LivekitAgent::disconnectParticipant');
            $routes->post('sendData', 'LivekitAgent::sendData');
            $routes->post('autoResponder', 'LivekitAgent::autoResponder');
        $routes->post('dispatchAgent', 'LivekitAgent::dispatchAgent');
        });

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}