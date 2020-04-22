<?php

namespace App;

interface IMethod
{
    public function get(array $request) : string;
    public function post(object $post) : void;
    public function put(array $request, object $put) : void;
    public function patch(array $request, object $patch) : void;
    public function delete(array $request) : void;
}
