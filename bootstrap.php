<?php
/*=============================================
=            Show Debug Display               =
=============================================*/

ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*=====  End of Show Debug Display     ======*/

include_once "Config/config.php";
include_once "Core/Route.php";
include_once "Core/View.php";
include_once "Model/CreateModels.php";

$app         = new Core\Route();
$rundatajson = new Model\CreateModels();
$rundatajson->boot();

return $app->route();
