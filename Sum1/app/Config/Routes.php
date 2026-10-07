<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/',        'Home::index');
$routes->get('tasks',    'Tasks::index');
$routes->get('profile',  'Profile::index');
$routes->get('about',    'About::index');

$routes->get('login',    'Auth::login');
$routes->post('login',   'Auth::attemptLogin');
$routes->post('logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('tasks', ['filter' => 'auth'], static function ($routes): void {
    $routes->get('new', 'Tasks::newTask');
    $routes->post('create', 'Tasks::create');
    $routes->get('edit/(:num)', 'Tasks::edit/$1');
    $routes->post('update/(:num)', 'Tasks::update/$1');
    $routes->post('delete/(:num)', 'Tasks::delete/$1');
});
