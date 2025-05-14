<?php

require_once __DIR__ . "/vendor/autoload.php";

use Config\ErrorLog;
use Config\ResponseHttp;
use Config\Router;

ErrorLog::activateErrorLog();

header('Content-Type: application/json');

$route = $_GET['route'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// Solo manejar rutas que empiecen con 'api/'
if (strpos($route, 'api/') === 0) {
    $route = str_replace('api/', '', $route);

    // Instanciar el router
    $router = new Router($route, $method);

    // Resolver la ruta (llama al controlador si existe)
    $router->resolver();
} else ResponseHttp::jsonResponse(200, 'Bienvenido a la app');
