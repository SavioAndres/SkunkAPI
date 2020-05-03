<?php

namespace App;

abstract class Connect
{
    private static $instance = null;

    protected static function connect() : object
    {
        if (is_null(self::$instance)) self::sqlConn();
        return self::$instance;
    }

    protected static function close() : void
    {
        die();
    }

    private static function sqlConn() : void
    {
        try {
            $config = parse_ini_file(__DIR__.'/../.config', true)['DATABASE'];
            $sql = $config['CONNECTION'] . ':host=' . $config['HOST'] . ';port=' . 
                    $config['PORT'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';
            self::$instance = new \PDO($sql, $config['USERNAME'], $config['PASSWORD']);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $exception) {
            http_response_code(500);
            die($exception->getMessage());
        }
    }

}