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
                $this->get();
                break;
            case 'POST':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->post();
                break;
            case 'PUT':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->put();
                break;
            case 'PATCH':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->patch();
                break;
            case 'DELETE':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->delete();
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