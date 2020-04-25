<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class About extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        if (parent::isRequest())
            $sql = parent::_select('SELECT * FROM test WHERE id = '. $request[0]);
        else
            $sql = parent::_select('SELECT * FROM test');
        return $sql;
    }

    public function post(array $post) : string
    {
        $sql = 'INSERT INTO test (name, text) VALUES (\''.$post['name'].'\', \''.$post['text'].'\')';
        parent::_insert($sql);
        return '{"menssage" : "Enviado com sucesso!"}';
    }

    public function put(array $request, array $put) : string
    {
        var_dump($request);
        var_dump($put);
        return '';
    }

    public function patch(array $request, array $patch) : string
    {
        var_dump($request);
        var_dump($patch);
        return '';
    }

    public function delete(array $request) : string
    {
        parent::_delete('DELETE FROM test WHERE id = ' . $request[0]);
        return '';
    }

}