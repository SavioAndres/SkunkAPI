<?php

namespace Controller;

use \App\Routes;
use \App\IMethod;

class About extends Routes implements IMethod
{

    public function get(array $request) : string
    {
        $select = parent::_select('SELECT * FROM test_2');
        return $select;
    }

    public function post(array $post) : string
    {
        $sql = 'INSERT INTO test_2 (nome, idade) VALUES (\''. $post['nome'] . '\', '. $post['idade'] . ')';
        $id = parent::_insert($sql);
        return 'Sucesso, id: '. $id;
    }

    public function put(array $request, array $put) : string
    {
        var_dump($request);
        var_dump($put);
        return 'put';
    }

    public function patch(array $request, array $patch) : string
    {
        var_dump($patch);
        return 'patch';
    }

    public function delete(array $request) : string
    {
        return '';
    }

}