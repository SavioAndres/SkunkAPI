<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class About extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        echo parent::_select('SELECT * FROM test');
        return '{"Welcome": "Bem--- vindo", "Framework" : "Skunk API", '.
            '"Body" : "Hello World!", "link" : "https://github.com/SavioAndres/SkunkAPI"}';
    }

    public function post(array $post) : string
    {
        var_dump($post);
        return '';
    }

    public function put(array $request, array $put) : string
    {
        var_dump($put);
        return 'put';
    }

    public function patch(array $request, array $patch) : string
    {
        var_dump($patch);
        return 'patch';
    }

    public function delete(array $request) : string
    {
        return '';
    }

}