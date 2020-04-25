<?php

namespace App;

interface IMethod
{
    public function get(array $request) : string;
    public function post(array $post) : string;
    public function put(array $request, array $put) : string;
    public function patch(array $request, array $patch) : string;
    public function delete(array $request) : string;
}
