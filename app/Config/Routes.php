<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */

// Home Section
$routes->get('/', 'Home::index');

// Kategori Section
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/(:num)/(:num)', 'Kategori::detail/$1/$2');
$routes->add('images/(:segment)', 'Images::show/$1');
$routes->add('css/(:segment)', 'Css::show/$1');
$routes->add('js/(:segment)', 'Js::show/$1');

// Marmut Details Section
$routes->get('/details/(:num)/(:num)', 'Marmut::details/$1/$2');
$routes->post('/hit/(:num)', 'Marmut::hit/$1');
$routes->post('/promo/(:any)', 'Marmut::cek_promo/$1');
$routes->post('/buy', 'Marmut::buy');

// Ongkir Section
$routes->get('/ongkir', 'Ongkir::index');

// Paket Section
$routes->get('/paket', 'Paket::index');

// Admin Section
$routes->group('admin', function (RouteCollection $routes) {
    // Grup rute admin
    $routes->add('/', 'AdminHome::index');
});

$routes->get('/admin/log', 'AdminHome::log');
$routes->post('/admin/log/filter', 'AdminHome::log');

$routes->get('/admin/best_seller', 'AdminBestSeller::index');
$routes->get('/admin/best_seller/(:num)/(:num)', 'AdminBestSeller::edit/$1/$2');
$routes->post('/admin/best_seller', 'AdminBestSeller::action_edit');

$routes->get('/admin/list', 'AdminMarmutList::index');
$routes->get('/admin/list/(:num)', 'AdminMarmutList::edit/$1');
$routes->post('/admin/list', 'AdminMarmutList::action_edit');