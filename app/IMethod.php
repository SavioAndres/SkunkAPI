<?php

namespace App;

interface IMethod
{
    public function get();
    public function post();
    public function put();
    public function patch();
    public function delete();
}
