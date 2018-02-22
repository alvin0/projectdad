<?php
namespace Core

/**
 * Route
 */

class ClassName
{
    public $arrayRoute = [
        'home'  => ['active' => 'home', 'function' => 'CallTest'],
        'home2' => ['active' => 'home2', 'function' => 'CallTest2'],
    ];

    public function checkGetParam($get)
    {
        unset($get['active']);
        unset($get['page']);
        if (sizeof($get) > 0) {
            return $get;
        }
        return false;
    }

    public function route()
    {
        $patch     = 'View/home.php';
        $active    = isset($_GET['active']) ? $_GET['active'] : null;
        $parameter = $this->checkGetParam($_GET) ? $this->checkGetParam($_GET) : null;
        if ($active != null) {
            if (isset($this->arrayRoute[$active])) {
                if (method_exists($this, $this->arrayRoute[$active]["function"])) {
                    if ($parameter) {
                        call_user_func_array(array($this, $this->arrayRoute[$active]["function"]), $parameter);
                    } else {
                        call_user_func(array($this, $this->arrayRoute[$active]["function"]));
                    }
                }
            } else {
                echo "Active null ";
            }
        } else {
            // include 'view/viewbook.php';
        }
    }
}
