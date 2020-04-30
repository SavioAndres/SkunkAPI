<?php

namespace App;

use App\DataAccessObject;

class Routes extends DataAccessObject
{
    private $method_;
    private $request_;

    public function __construct(string $method, array $request)
    {
        $this->request_ = $_GET;
        if (empty($this->request_)) {
            array_shift($request);
            array_shift($request);
            $this->request_ = $request;
        }
        $this->method_ = $method;
        self::roter();
    }
    
    protected function roter() : void
    {
        switch ($this->method_) {
            case 'GET':
                self::getRoute();
                break;
            case 'POST':
                self::postRoute();
                break;
            case 'PUT':
                self::putPatchRoute('PUT');
                break;
            case 'PATCH':
                self::putPatchRoute('PATCH');
                break;
            case 'DELETE':
                self::deleteRoute();
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    private function getRoute(): void
    {
        header('Content-Type: application/json');
        $get = $_GET;
        if (empty($get))
            $get = $this->request_;
        echo $this->get($get);   
    }

    private function postRoute(): void
    {
        header('Content-Type: application/x-www-form-urlencoded');
        echo $this->post(self::contentType());
    }

    private function putPatchRoute(string $type): void
    {
        if (self::isRequest()) {
            header('Content-Type: application/x-www-form-urlencoded');
            if ($type == 'PUT') {
                echo $this->put($this->request_, self::contentType());
            } else {
                echo $this->patch($this->request_, self::contentType());
            }
        } else {
            http_response_code(404);
        }
    }

    private function contentType(): array
    {
        try {
            if (strpos($_SERVER["CONTENT_TYPE"], 'application/json') !== false) {
                return (array) json_decode(file_get_contents('php://input'));
            }
            elseif (strpos($_SERVER["CONTENT_TYPE"], 'application/x-www-form-urlencoded') !== false) {
                $data = array();
                parse_str(file_get_contents('php://input'), $data);
                return $data;
            } else {
                http_response_code(405);
                throw new \Exception('Only CONTENT TYPE \'x-www-form-urlencoded\' and \'json\' are accepted');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function deleteRoute(): void
    {
        header('Content-Type: application/x-www-form-urlencoded');
        if (self::isRequest()) {
            echo $this->delete($this->request_);
        } else {
            http_response_code(404);
        }
    }

    protected function isRequest(): bool
    {
        return !empty($this->request_) && $this->request_[0] != '';
    }

    private function _PUT_PATCH(): object
    {
        $put = array();
        parse_str(file_get_contents('php://input'), $put);

        if ($_SERVER["CONTENT_TYPE"] == 'application/json')
            $put = json_decode(file_get_contents('php://input'));

        return $put;
    }



}