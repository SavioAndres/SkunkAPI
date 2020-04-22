<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class About extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        $sql = parent::_select('SELECT * FROM test');
        if (parent::isRequest())
            $sql = parent::_select('SELECT * FROM test WHERE id = '. $request[0]);
        
        return $sql;
    }

    public function post(object $post) : void
    {
        $sql = 'INSERT INTO test (name, text) VALUES (\''.$post->name.'\', \''.$post->text.'\')';
        parent::_insert($sql);
    }

    public function put(array $request, object $put) : void
    {
        var_dump($request);
        var_dump($put);
    }

    public function patch(array $request, object $patch) : void
    {
        var_dump($request);
        var_dump($patch);
    }

    public function delete(array $request) : void
    {
        parent::_delete('DELETE FROM test WHERE id = ' . $request[0]);
    }

}