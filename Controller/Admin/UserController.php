<?php
namespace Controller\Admin;

use Core\Route as Route;
use Core\View as View;
use Middleware\AdminMiddleware as Middleware;

/**
 * UserController
 */
class UserController
{
    public function getlogin()
    {
        $view = new View('admin/login');
        print $view;

    }
    public function postLogin()
    {
        $auth = new Middleware();
        if (isset($_POST['email']) && $_POST['password']) {
            if ($auth->Login($_POST['email'], $_POST['password'])) {
                Route::callRouteUrl('home', 'admin');
            }
        }

        $error = 'Email or password is not correct ';
        $view  = new View('admin/login', ['error' => $error]);
        print $view;
    }
    public function Logout()
    {
        $auth = new Middleware();
        if ($auth->Logout()) {
            Route::callRouteUrl('index');
        }
    }
}
