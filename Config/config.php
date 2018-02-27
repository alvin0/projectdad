<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
define('ROOT', realpath(dirname(__FILE__)) . '/../'); //Path to folder with tables
define('View', realpath(dirname(__FILE__)) . '/../View/'); //Path to folder with tables
require_once ROOT . 'vendor/autoload.php';
define('LAZER_DATA_PATH', ROOT . 'Model/databasejson/'); //Path to folder with tables
define('DefaultRoute', 'wellcome.php'); // view auto load when exite
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
define('SECURITYPOST', true); // security for form POST (true or false)
if (defined('SECURITYPOST') && SECURITYPOST) {
    $_token = md5(uniqid(rand(), true));
    if (!isset($_SESSION['_token'])) {
        $_SESSION['_token'] = $_token;
    }
    define('_token', $_SESSION['_token']); // security for form POST (true or false)
}
define('RunDBStart', false);
