<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;
use \App\Connect;

class About extends Routes implements IMethod
{
    //$this->request retorna um array com URL

    public function get(array $request) : string
    {
        return parent::_select('SELECT * FROM test');
    }

    public function post(array $post) : void
    {
        //var_dump(_POST('test'));
        //var_dump($post);
        $sql = 'INSERT INTO test (name, text) VALUES (\''.$post['name'].'\', \''.$post['text'].'\')';
        parent::_insert($sql);
        //file_get_contents('php://input')
    }

    public function put(string $key, array $put) : void
    {
        if (parent::parammeter('edit'))
        {
            var_dump(_PUT('test'));
            echo 'Em edição';
        }
    }

    public function patch(string $key, array $patch) : void
    {
        
    }

    public function delete(string $key) : void
    {
        parent::_delete('DELETE FROM test WHERE id = ' . $key);
        //echo(file_get_contents('php://input'));
    }

}