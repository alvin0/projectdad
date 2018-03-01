<?php
namespace Core;

/**
 * Controller
 */
class Auth
{
    protected $data;

    protected $sessionToken;

    protected $middlewareData = null;

    public function checkMiddlewareData()
    {
        if ($middlewareData) {
            if (is_array($middlewareData)) {
                foreach ($middlewareData) {
                    foreach ($middlewareData as $item) {
                        if (is_string($item)) {
                            //code
                        } else {
                            echo "Middleware get fail data, please check data again!";
                            die;
                        }
                    }
                }
            } else {
                echo "Data of middleware is Array!";
                die;
            }
        }
        echo "Middleware get fail data, please check data again!";
        die;
    }

    public function checkAuthDataJson($password)
    {
        if ($middlewareData) {

        }
    }

}
