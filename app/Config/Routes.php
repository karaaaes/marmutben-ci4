<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/(:num)/(:num)', 'Kategori::detail/$1/$2');
$routes->add('images/(:segment)', 'Images::show/$1');
$routes->add('css/(:segment)', 'Css::show/$1');
$routes->add('js/(:segment)', 'Js::show/$1');


