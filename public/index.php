<?php

include_once '../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];

$request = explode('/', $_SERVER['REQUEST_URI']);
if (empty($request[1])) $request[1] = 'index';

if (file_exists(__DIR__ . '/../src/' . $request[1] . '.php'))
{
    require __DIR__ . '/../src/' . $request[1] . '.php';
}
else
{
    require __DIR__ . '/404.php';
}
