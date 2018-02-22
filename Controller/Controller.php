<?php

class Controller
{
    protected $arrayRoute;
    public function __construct()
    {
        include ROOT . 'route.php';
        $this->arrayRoute = $route;
    }

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
        // $patch     = 'View/home.php';
        $active = isset($_GET['active']) ? $_GET['active'] : null;
        if (isset($_GET['active'])) {
            $active = $_GET['active'];
        } elseif (isset($this->arrayRoute['default']["function"])) {
            $active = 'default';
        } else {
            include View . 'own/own.php';
        }
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
        }
    }

    public function CallTest()
    {
        echo "12";
    }

    public function CallTest2($test)
    {
        var_dump($test);
    }

}
