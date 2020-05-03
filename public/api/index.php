<?php
/**
 * Author: Sávio Andres
 * Link: https://github.com/SavioAndres/SkunkAPI
 * License: MIT
 */

$config = parse_ini_file(__DIR__.'/../../.config', true)['APP'];
header('Access-Control-Allow-Origin: ' . $config['URL']);

include_once '../../vendor/autoload.php';
include_once '../../routes.php';

$request = explode('/', $_SERVER['REQUEST_URI']);
if (empty($request[2])) $request[2] = 'index';

if (array_key_exists($request[2], $routes)) {
    if (class_exists('Controller\\' . $routes[$request[2]])) {
        $obj = 'Controller\\' . $routes[$request[2]];
        new $obj($_SERVER['REQUEST_METHOD'], $request);
    } else {
        echo 'A classe "' . $routes[$request[2]] . '" definida em Routes não foi implementada.';
    }
} else {
    http_response_code(404);
}
