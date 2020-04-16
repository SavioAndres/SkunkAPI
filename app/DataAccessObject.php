<?php

namespace App;

use App\Connect;

class DataAccessObject extends Connect
{

    protected function insert(string $sql)
    {
        try {
            //$sql = 'INSERT INTO test (name, text) VALUES (\'primeiro\', \'ttttt\')';
            $stmt = Connect::connect()->prepare($sql);
            $stmt->execute();
        } catch (\Exception $e) {
            echo 'erro'.$e->getMessage();
        }
    }

    protected function select(string $sql)
    {   
        try 
        {
            $stmt = Connect::connect()->prepare($sql);
            $stmt->execute();
            $json = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return \json_encode($json);
        } 
        catch (\Exception $e) 
        {
            echo 'erro'.$e->getMessage();
        }
    }

    protected function delete()
    {
        
    }

}