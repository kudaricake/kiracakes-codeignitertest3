<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('hello', 'Helloworld::index');
$routes->get('about', 'Pages::about');
$routes->get('products', 'Products::index');
$routes->get('products/(:num)', 'Products::show/$1');
$routes->get('accounts/customers', 'Accounts::customers');
$routes->get('accounts/users', 'Accounts::users');
$routes->match(['get', 'post'], 'customers/new', 'Accounts::newCustomer');
$routes->match(['get', 'post'], 'customers/edit/(:num)', 'Accounts::editCustomer/$1');
$routes->match(['get', 'post'], 'users/new', 'Accounts::newUser');
$routes->match(['get', 'post'], 'users/edit/(:num)', 'Accounts::editUser/$1');
