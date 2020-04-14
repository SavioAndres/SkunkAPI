<?php

namespace App;

use App\DataAccessObject;

class Routes extends DataAccessObject
{
    private $method;
    protected $request;

    public function __construct()
    {
        $this->request = [];
    }

    public function run(string $method) : void
    {
        $this->method = $method;
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
        switch ($this->method)
        {
            case 'GET':
                header('Content-Type: application/json');
                $this->get();
                break;
            case 'POST':
                $this->post();
                break;
            case 'PUT':
                $this->put();
                break;
            case 'PATCH':
                $this->patch();
                break;
            case 'DELETE':
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