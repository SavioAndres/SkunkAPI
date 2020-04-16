<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;
use \App\Connect;

class About extends Routes implements IMethod
{
    //$this->request retorna um array com URL

    public function get()
    {
        echo parent::select('SELECT * FROM test');
    }

    public function post() : void
    {
        var_dump(_POST('test'));
        //file_get_contents('php://input')
    }

    public function put() : void
    {
        if (parent::parammeter('edit'))
        {
            var_dump(_PUT('test'));
            echo 'Em edição';
        }
    }

    public function patch() : void
    {
        
    }

    public function delete() : void
    {
        echo(file_get_contents('php://input'));
    }

}