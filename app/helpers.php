<?php

function _POST(string $name)
{
    return filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
}

function _PUT(string $name = '')
{
    $_PUT = array();
    if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
        parse_str(file_get_contents('php://input'), $_PUT);
    }
    return !empty($name) ? $_PUT[$name] : $_PUT;
}

function _DELETE()
{
    $_DELETE = array();
    if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
        parse_str(file_get_contents('php://input'), $_DELETE);
    }
    return $_DELETE;
}

function test()
{
    echo 'Funciona!';
}