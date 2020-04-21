<?php

namespace App;

interface IMethod
{
    public function get(array $request) : string;
    public function post(array $post) : void;
    public function put(string $key, array $put) : void;
    public function patch(string $key, array $patch) : void;
    public function delete(string $key) : void;
}
