<?php

namespace Core;

/**
 * Route
------------
 *** User manual:

This is the router to use via the GET method with the routing value "active".

Example : index.php?active=home

After the variable "active" and "group" the next variable being entered will be the variable passed to the controller.

Example :
index.php?active=home&param1=test&param2=test2
index.php?group=admin&active=home&param1=test&param2=test2


 */

class Route {
    protected $arrayRoute;
    protected $defautlPatch;
    public function __construct() {
        include ROOT . 'route.php';
        $this->arrayRoute = $route;
        $this->setdefaultPatch();
    }

    public function setdefaultPatch() {

        if (!defined('DefaultRoute') || !file_exists(ROOT . '/View/' . DefaultRoute)) {
            echo 'Please config defined "DefaultRoute" in /config/config file! If you configure file config.php then check path it does not exist.';
            die;
        } else {
            $this->defautlPatch = DefaultRoute;
        }
    }

    public function checkGetParam($get) {
        unset($get['active']);
        unset($get['group']);
        unset($get['page']);
        if (sizeof($get) > 0) {
            return $get;
        }
        return false;
    }

    public function getNameSpaceAndController($use) {
        $explodeUse = explode("@", $use);
        if (isset($explodeUse[0])) {
            $getController = $explodeUse[0];
        } else {
            return null;
        }
        if (isset($explodeUse[1])) {
            $getNameFunction = $explodeUse[1];
        } else {
            return null;
        }
        return ["controller" => $getController, "function" => $getNameFunction];

    }

    public function route() {
        $this->checkSecurityFormPost();
        $active = isset($this->arrayRoute['index']) ? 'index' : null;
        $group  = isset($_GET['group']) ? $_GET['group'] : null;
        if (isset($_GET['active'])) {
            if ($_GET['active'] == 'alvin' && $group == null) {
                return include View . 'own/own.php';
            } else {
                $active = $_GET['active'];
            }
        } else {
            if (!isset($_GET['page'])) {
                if (!empty($_GET)) {
                    return include View . $this->defautlPatch;
                }
            }
        }

        if (isset($this->arrayRoute[$active]) || isset($this->arrayRoute[$group]['group'][$active])) {
            $parameter = $this->checkGetParam($_GET) ? $this->checkGetParam($_GET) : null;
            if ($active != null) {
                if (isset($this->arrayRoute[$active]['middleware']) || isset($this->arrayRoute[$group]['middleware'])) {
                    $middlewareOri = isset($this->arrayRoute[$active]['middleware']) ? $this->arrayRoute[$active]['middleware'] : $this->arrayRoute[$group]['middleware'];
                    if (is_array($middlewareOri)) {
                        try {
                            require_once ROOT . 'Middleware/' . $middlewareOri['use'] . '.php';
                            $namespace     = str_replace(" ", "", '\Middleware\ ' . $middlewareOri['use']);
                            $middlewareApp = new $namespace();
                            call_user_func(array($middlewareApp, 'boot'));
                        } catch (Exception $e) {
                            echo "Middleware is Array, please check again!";
                            die;

                        }
                    } else {
                        echo "Middleware is Array, please check again!";
                        die;
                    }
                }
                if ($group) {
                    $arrayControllerFunction = $this->getNameSpaceAndController($this->arrayRoute[$group]['group'][$active]["use"]);
                } else {
                    $arrayControllerFunction = $this->getNameSpaceAndController($this->arrayRoute[$active]["use"]);
                }
                $getCharSpecial = trim("\ ");
                $namerequire    = str_replace($getCharSpecial, "/", $arrayControllerFunction['controller']);
                require_once ROOT . 'Controller/' . $namerequire . '.php';
                $namespace = str_replace(" ", "", '\Controller\ ' . $arrayControllerFunction['controller']);
                $app       = new $namespace();
                if (method_exists($app, $arrayControllerFunction['function'])) {
                    if ($parameter) {
                        call_user_func_array(array($app, $arrayControllerFunction['function']), $parameter);
                        exit;
                    } else {
                        call_user_func(array($app, $arrayControllerFunction['function']));
                        exit;
                    }
                    return include View . $this->defautlPatch;
                }
                return include View . $this->defautlPatch;
            }
            return include View . $this->defautlPatch;
        }
        return include View . $this->defautlPatch;
    }

    // $previous = $_SERVER['HTTP_REFERER'];
    public function checkSecurityFormPost() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "POST" && defined('SECURITYPOST') && SECURITYPOST) {
            if (isset($_POST['_token'])) {
                if ($_POST['_token'] != $_SESSION['_token']) {
                    $_token             = md5(uniqid(rand(), true));
                    $_SESSION['_token'] = $_token;
                } else {
                    $_token             = md5(uniqid(rand(), true));
                    $_SESSION['_token'] = $_token;
                }
            } else {
                echo 'Security form POST low! Plase add input ' . htmlspecialchars(' <input type="hidden" name="_token" value="<?php echo _token; ?>" /> ') . ' in this form!';
                // header("Location: $previous");
                die;
            }
        }
        $_token             = md5(uniqid(rand(), true));
        $_SESSION['_token'] = $_token;
    }

    public function callRouteUrl($active = null, $group = null, $compact = null) {
        if ($active) {
            if ($group) {
                $url = '?group=' . $group . '&active=' . $active;
            } else {
                $url = '?active=' . $active;
            }
            if ($compact) {
                if (is_array($compact)) {
                    foreach ($compact as $key => $value) {
                        $url = $url . "&" . $key . "=" . $value;
                    }
                } else {
                    echo "Data compact is array";
                    die;
                }
            }
            header("Location: $url");
        } else {
            echo "This url ";
        }
    }
}
