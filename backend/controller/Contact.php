<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class Contact extends Routes implements IMethod
{
    //$this->request retorna um array com URL

    public function get()
    {
        if ($this->request[0] == 'edit')
        {
            echo 'Em edição'. $this->request[1];
        }
    }

    public function post() : void
    {
        
    }

    public function put() : void
    {
        if ($this->request[0] == 'edit')
        {
            echo 'Em edição';
        }
    }

    public function patch() : void
    {
        
    }

    public function delete() : void
    {
        
    }
}