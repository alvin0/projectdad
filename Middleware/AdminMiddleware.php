<?php
namespace Middleware;

use Core\Auth as Auth;

/**
 *UserMiddleware
 */
class AdminMiddleware
{
    protected $middleware;

    protected $nameSession = 'admin'; //name save session

    public function boot()
    {
        $Auth = new Auth;
        if (!$Auth->CheckAuth($this->nameSession)) {
            echo "Login Off";
            die;
        }

    }

    /*
    config Middleware,
    this data check in your database. Call it when login if success it create session data.
     */
    public function CreateAndSaveMiddleware($table, $field1, $field2)
    {
        $this->middleware = [
            'name' => $this->nameSession, // name auth
            'data' => [
                'table'    => 'users', // name table check
                'email'    => $field1, // field 1 check username/ email /...
                'password' => $field2, // check password match with fied 1
            ]];
        $Auth = new Auth;
        $Auth->checkMiddlewareData($this->middleware);
        // Auth::($this->middleware);
        return false;
    }

    public function CheckRule()
    {
        return true;
    }

    public function Login($email, $password)
    {
        // $email    = 'admin@alvinframework.com';
        // $password = 'admin';
        $data = $this->CreateAndSaveMiddleware($this->nameSession, $email, $password);
        return true;
    }

    public function Logout()
    {
        $Auth = new Auth;
        $Auth->EndAuth($this->nameSession);
        return "Logout";
    }

    public function getData()
    {
        $Auth = new Auth;
        if (!$Auth->CheckAuth($this->nameSession)) {
            return null;
        } else {
            return $Auth->CheckAuth($this->nameSession);
        }
    }

}
