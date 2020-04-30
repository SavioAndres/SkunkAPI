<?php

namespace App;

use App\Connect;

class DataAccessObject extends Connect
{

    protected function _insert(string $sql)
    {
        try {
            //$sql = 'INSERT INTO test (name, text) VALUES (\'primeiro\', \'ttttt\')';
            $stmt = Connect::connect()->prepare($sql);
            $stmt->execute();
        } catch (\Exception $e) {
            http_response_code(416);
            echo $e->getMessage();
            Connect::close();
        }
    }

    protected function _select(string $sql)
    {   
        try {
            $stmt = Connect::connect()->prepare($sql);
            $stmt->execute();
            $json = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return \json_encode($json);
        } catch (\Exception $e) {
            http_response_code(416);
            echo $e->getMessage();
            Connect::close();
        }
    }

    protected function _delete(string $sql)
    {
        try {
            //$sql = 'INSERT INTO test (name, text) VALUES (\'primeiro\', \'ttttt\')';
            $stmt = Connect::connect()->prepare($sql);
            $stmt->execute();
        } catch (\Exception $e) {
            http_response_code(416);
            echo $e->getMessage();
            Connect::close();
        }
    }

}