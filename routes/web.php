<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use Php22\Router;

$router = new Router();

// Example routes
$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/products', [ProductController::class, 'index']);
$router->addRoute('GET', '/users', [UserController::class, 'index']);
$router->addRoute('GET', '/users/create', [UserController::class, 'create']);
$router->addRoute('POST', '/users', [UserController::class, 'store']);

// Dispatch the router
$router->dispatch();
