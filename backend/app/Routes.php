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
                $get = $_GET;
                if (empty($get))
                    $get = $this->request_;
                echo $this->get($get);   
                break;
            case 'POST':
                header('Content-Type: application/x-www-form-urlencoded');
                try {
                    if (strpos($_SERVER["CONTENT_TYPE"], 'application/json') !== false) {
                        $post = (array) json_decode(file_get_contents('php://input'));
                    }
                    elseif (strpos($_SERVER["CONTENT_TYPE"], 'application/x-www-form-urlencoded') !== false) {
                        $post = $_POST;
                    } else {
                        http_response_code(405);
                        throw new \Exception('Only CONTENT TYPE \'x-www-form-urlencoded\' and \'json\' are accepted');
                    }
                    echo $this->post($post);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                break;
            case 'PUT':
                header('Content-Type: application/x-www-form-urlencoded');
                if (self::isRequest()) {
                    echo $this->put($this->request_, self::_PUT_PATCH());
                } else {
                    http_response_code(404);
                }
                break;
            case 'PATCH':
                header('Content-Type: application/x-www-form-urlencoded');
                if (self::isRequest()) {
                    echo $this->patch($this->request_, self::_PUT_PATCH());
                } else {
                    http_response_code(404);
                }
                break;
            case 'DELETE':
                header('Content-Type: application/x-www-form-urlencoded');
                if (self::isRequest()) {
                    echo $this->delete($this->request_);
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

        return $put;
    }



}