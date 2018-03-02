<?php
namespace Core;

use Core\Functions\Bcrypt as Bcrypt;
use Lazer\Classes\Database as DB;

/**
 * Controller
 */
class Auth
{
    protected $nameSession;
    protected $dataAuth;

    public function checkMiddlewareData($middlewareData)
    {
        if ($middlewareData) {
            if (is_array($middlewareData['data'])) {

                $this->nameSession = $middlewareData['name'] . '272167b3073c4672b0a8f39030418a18';
                $data              = $middlewareData['data'];
                $user              = DB::table($data['table']);
                $passwordcheck     = $data['password'];
                unset($data['table']);
                unset($data['password']);
                foreach ($data as $key => $value) {
                    $user = $user->where($key, '=', $value);
                }
                $user = $user->find();
                if ($user) {
                    if (Bcrypt::checkPassword($passwordcheck, $user->password)) {
                        $this->dataAuth = $user;
                        $this->CreateSession();
                        return true;
                        die;
                    } else {
                        return false;
                    }
                }
                return false;
            }
        } else {
            echo "Data of middleware is Array!";
            die;
        }
        echo "Middleware get fail data, please check data again!";
        die;
    }

    public function CreateSession()
    {
        $_SESSION[$this->nameSession] = [
            'timestart' => $_SERVER['REQUEST_TIME'],
            'data'      => $this->dataAuth,
        ];

        return true;
    }

    public function EndAuth($name)
    {
        $namecheck = $name . '272167b3073c4672b0a8f39030418a18';

        unset($_SESSION[$namecheck]);

        if (!isset($_SESSION[$namecheck])) {
            return true;
        }
        return false;
    }

    public function CheckAuth($name)
    {
        $namecheck = $name . '272167b3073c4672b0a8f39030418a18';
        // dd($namecheck);
        if (isset($_SESSION[$namecheck])) {
            if ($this->CheckTimeOutSession($_SESSION[$namecheck]['timestart'], $namecheck)) {
                return $_SESSION[$namecheck]['data'];
            }
            return false;
        }
        return false;
    }

    public function CheckTimeOutSession($time, $nameSession)
    {
        $thisTime         = $_SERVER['REQUEST_TIME'];
        $timeout_duration = 7200;
        if (($thisTime - $time) > $timeout_duration) {
            unset($_SESSION[$nameSession]);
            return false;
        }
        return true;
    }

}
