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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home/msg/:any', 'Home::index');
$routes->get('/regolamento', 'Home::regolamento');
$routes->get('/privacy', 'Home::privacy');
$routes->get('/cart', 'Home::cart');
$routes->get('/cart/confirm/:any', 'Home::cart');
$routes->get('/confirm/:any', 'Home::confirmPrize');
$routes->get('/faq', 'Home::faq');
$routes->get('/contact', 'Home::contact');

$routes->get('/login', 'User::login');
$routes->get('/lost', 'User::lost');
$routes->get('/registrazione', 'User::registrazione');
$routes->get('/registrazione/pro/:any', 'User::registrazione');
$routes->get('/profilo', 'User::profilo');
$routes->get('/profilo', 'User::profilo');
$routes->post('/profilo/close', 'User::profilo');
//MODIFICA 31 GENNAIO PER VERIFICA DA RIABILITARE
// //$routes->get('/profilo/edit', 'User::profiloEdit');
// $routes->get('/profilo/edit/:any', 'User::profiloEdit');
// $routes->post('/profilo/edit/:any/update', 'User::profiloEdit');
// $routes->post('/profileEdit/:any', 'User::profiloUpdate');
//FINE MODIFICA
$routes->get('/storico/:any', 'User::storico');
$routes->get('/dashboard', 'User::dashboard');
$routes->get('/mydashboard', 'User::dashboard');
$routes->get('/logout', 'User::logout');

//$routes->match(['get', 'post'], '/contact', 'Home::contactSend');
$routes->post('/contactSend', 'Home::contactSend');
$routes->post('/registration_confirm', 'Home::registrationConfirm');
$routes->match(['get', 'post'],'/registration_confirm/error', 'Home::registrationConfirm');
$routes->post('/rconfirm/:any', 'Home::registrationConfirm');
$routes->get('/userActive/:any', 'Home::registrationActive');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/admin/utenti/list', 'Admin::utentiList');
$routes->get('/admin/utenti/new', 'Admin::utentiNew');
$routes->get('/admin/sondaggi/list', 'Admin::sondaggiList');
$routes->get('/admin/sondaggi/new', 'Admin::sondaggiNew');
$routes->get('/admin/setting/page/:num', 'Admin::sondaggiNew');
$routes->get('/admin/setting/email', 'Admin::sondaggiNew');

//$routes->post('/api/doLogin', 'Api::doLogin');
$routes->get('/api/getSurveys', 'Api::getSurveys');
$routes->get('/api/getCart', 'Api::getCart');
$routes->get('/api/getUserData', 'Api::getUserData');

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
