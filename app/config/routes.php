<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * URI ROUTING
 * ------------------------------------------------------------------
 */

/** @var object $router **/

$router->get('/', 'LoginController::index');

$router->get('/student', 'StudentController::index');

$router->get('/student/profile', 'StudentController::profile')
       ->middleware('student');

$router->get('/users', 'UsersController::index');


/*
|--------------------------------------------------------------------------
| PRODUCT ROUTES
|--------------------------------------------------------------------------
*/

$router->get('/products', 'ProductController::index');

$router->get('/products/create', 'ProductController::create');

$router->post('/products/store', 'ProductController::store');

$router->get('/products/edit/{id}', 'ProductController::edit')
       ->where_number('id');

$router->post('/products/update/{id}', 'ProductController::update')
       ->where_number('id');

$router->get('/products/delete/{id}', 'ProductController::delete')
       ->where_number('id');


       $router->get('/login', 'LoginController::index');

$router->post('/login', 'LoginController::login');

$router->get('/logout', 'LoginController::logout');