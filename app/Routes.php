<?php

namespace App;

use App\DataAccessObject;

class Routes extends DataAccessObject
{
    private $method_;
    private $request_;

    public function __construct(string $method, array $request)
    {
        $this->request_ = [];
        array_shift($request);
        array_shift($request);
        $this->request_ = $request;

        $this->method_ = $method;
        self::roter();
    }
    
    protected function roter() : void
    {
        switch ($this->method_)
        {
            case 'GET':
                header('Content-Type: application/json');
                echo $this->get($this->request_);
                break;
            case 'POST':
                header('Content-Type: application/x-www-form-urlencoded');
                $this->post((object) $_POST);
                break;
            case 'PUT':
                if (self::isRequest()) {
                    header('Content-Type: application/x-www-form-urlencoded');
                    $this->put($this->request_, self::_PUT_PATCH());
                } else {
                    http_response_code(404);
                }
                break;
            case 'PATCH':
                if (self::isRequest()) {
                    header('Content-Type: application/x-www-form-urlencoded');
                    $this->patch($this->request_, self::_PUT_PATCH());
                } else {
                    http_response_code(404);
                }
                break;
            case 'DELETE':
                if (self::isRequest()) {
                    header('Content-Type: application/x-www-form-urlencoded');
                    $this->delete($this->request_);
                } else {
                    http_response_code(404);
                }
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    protected function isRequest() : bool
    {
        return !empty($this->request_) && $this->request_[0] != '';
    }

    private function _PUT_PATCH(): object
    {
        $put = array();
        parse_str(file_get_contents('php://input'), $put);
        return (object) $put;
    }



}