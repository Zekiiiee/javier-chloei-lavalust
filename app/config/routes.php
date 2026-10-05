<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

// log in

/** @var object $router **/

$router->get('/', 'LoginController::index');

//student

$router->get('/student', 'StudentController::index');

$router->get('/student/profile', 'StudentController::profile')
       ->middleware('student');

$router->get('/users', 'UsersController::index');



//product (view-based)

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

// =============================================
// API Routes — CORS OPTIONS Preflight
// =============================================
$cors_handler = function() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, Accept, Origin');
    http_response_code(204);
    exit;
};

$router->options('/api/auth/register', $cors_handler);
$router->options('/api/auth/login', $cors_handler);
$router->options('/api/auth/refresh', $cors_handler);
$router->options('/api/auth/logout', $cors_handler);
$router->options('/api/create', $cors_handler);
$router->options('/api/profile', $cors_handler);
$router->options('/api/list', $cors_handler);
$router->options('/api/update/{id}', $cors_handler)->where_number('id');
$router->options('/api/delete/{id}', $cors_handler)->where_number('id');
$router->options('/api/login', $cors_handler);
$router->options('/api/register', $cors_handler);
$router->options('/api/logout', $cors_handler);
$router->options('/api/refresh', $cors_handler);
$router->options('/api/products', $cors_handler);
$router->options('/api/products/{id}', $cors_handler)->where_number('id');

// =============================================
// API Routes — Authentication (supports both /api/auth/* and /api/*)
// =============================================
$router->post('/api/auth/register', 'AuthController::register');
$router->post('/api/auth/login', 'AuthController::login');
$router->post('/api/auth/refresh', 'AuthController::refresh');
$router->post('/api/auth/logout', 'AuthController::logout');

// Marasigan API Tester uses POST /create for account registration.
$router->post('/api/create', 'AuthController::register');

$router->post('/api/register', 'AuthController::register');
$router->post('/api/login', 'AuthController::login');
$router->post('/api/refresh', 'AuthController::refresh');
$router->post('/api/logout', 'AuthController::logout');
$router->get('/api/profile', 'AuthController::profile');
$router->get('/api/list', 'AuthController::list_users');
$router->put('/api/update/{id}', 'AuthController::update_user')->where_number('id');
$router->delete('/api/delete/{id}', 'AuthController::delete_user')->where_number('id');

// =============================================
// API Routes — Products (JWT-protected in controller)
// =============================================
$router->get('/api/products', 'ApiProductController::index');
$router->get('/api/products/{id}', 'ApiProductController::show')
       ->where_number('id');
$router->post('/api/products', 'ApiProductController::store');
$router->put('/api/products/{id}', 'ApiProductController::update')
       ->where_number('id');
$router->patch('/api/products/{id}', 'ApiProductController::update')
       ->where_number('id');
$router->delete('/api/products/{id}', 'ApiProductController::destroy')
       ->where_number('id');

// =============================================
// Migration Routes
// =============================================
$router->get('create-migration/{migration_class}', 'MigrationController::create_migration');
$router->get('migrate', 'MigrationController::migrate');
$router->get('rollback', 'MigrationController::rollback');
$router->get('rollback-all', 'MigrationController::rollback_all');
$router->get('refresh', 'MigrationController::refresh');
$router->get('status', 'MigrationController::status');
