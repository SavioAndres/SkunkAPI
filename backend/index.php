<?php
/**
 * Author: Sávio Andres
 * Link: https://github.com/SavioAndres/SkunkAPI
 * License: MIT
 */

include_once 'vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', $_SERVER['REQUEST_URI']);
if (empty($request[2])) $request[2] = 'index';

$controller = ucfirst($request[2]);

if (file_exists(__DIR__ . '/controller/' . $controller . '.php'))
{
    require __DIR__ . '/controller/' . $controller . '.php';
    $obj = 'Controller\\' . $controller;
    new $obj($method, $request);
}
else
{
    http_response_code(404);
}