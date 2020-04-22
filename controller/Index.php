<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class Index extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        return '{"Welcome": "Hello World!"}';
    }

    public function post(object $post) : void
    {
        var_dump($post);
    }

    public function put(array $request, object $put) : void
    {
        
    }

    public function patch(array $request, object $patch) : void
    {
        
    }

    public function delete(array $request) : void
    {

    }

}