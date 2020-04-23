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
                
                try {
                    if ($_SERVER["CONTENT_TYPE"] == 'application/x-www-form-urlencoded') {
                        $post = $_POST;
                    } elseif ($_SERVER["CONTENT_TYPE"] == 'application/json') {
                        $post = json_decode(file_get_contents('php://input'));
                    } else {
                        http_response_code(405);
                        throw new \Exception('Only CONTENT TYPE \'x-www-form-urlencoded\' and \'json\' are accepted');
                    }
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                $this->post((object) $post);
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

        if ($_SERVER["CONTENT_TYPE"] == 'application/json')
            $put = json_decode(file_get_contents('php://input'));

        return (object) $put;
    }



}