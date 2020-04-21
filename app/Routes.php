<?php

namespace App;

use App\DataAccessObject;

class Routes extends DataAccessObject
{
    private $method_;
    protected $request;

    public function __construct()
    {
        $this->request = [];
    }

    public function method(string $method_) : void
    {
        $this->method_ = $method_;
        self::roter();
    }

    public function request(array $request) : void
    {
        array_shift($request);
        array_shift($request);
        $this->request = $request;
    }
    
    protected function roter() : void
    {
        switch ($this->method_)
        {
            case 'GET':
                header('Content-Type: application/json');
                echo $this->get($this->request);
                break;
            case 'POST':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->post($_POST);
                break;
            case 'PUT':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->put($this->request[0], []);
                break;
            case 'PATCH':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->patch($this->request[0], []);
                break;
            case 'DELETE':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->delete($this->request[0]);
                break;
            default:
                
                break;
        }
    }

    protected function parammeter(string $accion) : bool
    {
        return !empty($this->request) && $this->request[0] == $accion;
    }
}