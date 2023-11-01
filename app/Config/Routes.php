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

$routes->get('/admin/login', 'AdminLogin::index');
$routes->post('/admin/login', 'AdminLogin::login');
$routes->get('/admin/logout', 'AdminLogin::logout');

$routes->group('admin', ['filter' => 'sessioncheck'], function (RouteCollection $routes) {
    $routes->add('/', 'AdminHome::index');
    $routes->add('log', 'AdminHome::log');
    $routes->add('log/filter', 'AdminHome::log', ['post']);

    $routes->add('best_seller', 'AdminBestSeller::index');
    $routes->add('best_seller/(:num)/(:num)', 'AdminBestSeller::edit/$1/$2');
    $routes->add('best_seller', 'AdminBestSeller::action_edit', ['post']);
    
    $routes->add('list', 'AdminMarmutList::index');
    $routes->add('list/(:num)', 'AdminMarmutList::edit/$1');
    $routes->add('list', 'AdminMarmutList::action_edit', ['post']);
    $routes->add('list/add', 'AdminMarmutList::add');
    $routes->add('list/add', 'AdminMarmutList::action_add', ['post']);
    $routes->add('list/delete', 'AdminMarmutList::action_delete', ['post']);
    
    $routes->add('ongkir', 'AdminOngkir::index');
    $routes->add('ongkir/import_ongkir', 'AdminOngkir::import_ongkir', ['post']);
    $routes->add('ongkir/delete_ongkir', 'AdminOngkir::delete_ongkir');
    
    $routes->add('paket', 'AdminPaket::index');
    $routes->add('paket/import_paket', 'AdminPaket::import_paket', ['post']);
    $routes->add('paket/delete_paket', 'AdminPaket::delete_paket', ['post']);
    $routes->add('paket/delete_all_paket', 'AdminPaket::delete_all_paket', ['post']);
    
    $routes->add('settings', 'AdminSettings::index');
    $routes->add('settings/edit_config', 'AdminSettings::edit_config', ['post']);
    
    $routes->add('promo', 'AdminPromo::index');
    $routes->add('promo/add', 'AdminPromo::add');
    $routes->add('promo/action_add', 'AdminPromo::action_add', ['post']);
    $routes->add('promo/(:num)', 'AdminPromo::edit/$1');
    $routes->add('promo/action_edit', 'AdminPromo::action_edit', ['post']);
    $routes->add('promo/action_delete', 'AdminPromo::action_delete', ['post']);
});

// $routes->get('/admin/best_seller', 'AdminBestSeller::index');
// $routes->get('/admin/best_seller/(:num)/(:num)', 'AdminBestSeller::edit/$1/$2');
// $routes->post('/admin/best_seller', 'AdminBestSeller::action_edit');

// $routes->get('/admin/list', 'AdminMarmutList::index');
// $routes->get('/admin/list/(:num)', 'AdminMarmutList::edit/$1');
// $routes->post('/admin/list', 'AdminMarmutList::action_edit');
// $routes->get('/admin/list/add', 'AdminMarmutList::add');
// $routes->post('/admin/list/add', 'AdminMarmutList::action_add');
// $routes->post('/admin/list/delete', 'AdminMarmutList::action_delete');

// $routes->get('/admin/ongkir', 'AdminOngkir::index');
// $routes->post('/admin/ongkir/import_ongkir', 'AdminOngkir::import_ongkir');
// $routes->get('/admin/ongkir/delete_ongkir', 'AdminOngkir::delete_ongkir');

// $routes->get('/admin/paket', 'AdminPaket::index');
// $routes->post('/admin/paket/import_paket', 'AdminPaket::import_paket');
// $routes->post('/admin/paket/delete_paket', 'AdminPaket::delete_paket');
// $routes->post('/admin/paket/delete_all_paket', 'AdminPaket::delete_all_paket');

// $routes->get('/admin/settings', 'AdminSettings::index');
// $routes->post('/admin/settings/edit_config', 'AdminSettings::edit_config');

// $routes->get('/admin/promo', 'AdminPromo::index');
// $routes->get('/admin/promo/add', 'AdminPromo::add');
// $routes->post('/admin/promo/action_add', 'AdminPromo::action_add');
// $routes->get('/admin/promo/(:num)', 'AdminPromo::edit/$1');
// $routes->post('/admin/promo/action_edit', 'AdminPromo::action_edit');
// $routes->post('/admin/promo/action_delete', 'AdminPromo::action_delete');