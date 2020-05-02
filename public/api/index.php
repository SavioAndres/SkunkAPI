<?php
/**
 * Author: Sávio Andres
 * Link: https://github.com/SavioAndres/SkunkAPI
 * License: MIT
 */

include_once '../../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', $_SERVER['REQUEST_URI']);
if (empty($request[2])) $request[2] = 'index';

include_once '../../routes.php';

if (array_key_exists($request[2], $routes)) {
    if (class_exists('Controller\\' . $routes[$request[2]])) {
        $obj = 'Controller\\' . $routes[$request[2]];
        new $obj($method, $request);
    } else {
        echo 'A classe "' . $routes[$request[2]] . '" definida em Routes não foi implementada.';
    }
} else {
    http_response_code(404);
}
