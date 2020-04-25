<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class Index extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        return '{"Welcome": "Bem vindo", "Framework" : "Skunk API",
             "Body" : "Hello World!", "link" : "https://github.com/SavioAndres/SkunkAPI"}';
    }

    public function post(array $post) : string
    {
        return '';
    }

    public function put(array $request, array $put) : string
    {
        return '';
    }

    public function patch(array $request, array $patch) : string
    {
        return '';
    }

    public function delete(array $request) : string
    {
        return '';
    }

}