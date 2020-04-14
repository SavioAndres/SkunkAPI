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
        if (parent::parammeter('edit'))
        {
            $select = parent::select('SELECT * FROM test');
            var_dump($select);
        }
    }

    public function post() : void
    {
        //INSERT INTO test (name, text) VALUES (\'primeiro2\', \'ttttt2\')
        var_dump($_POST['test']);
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