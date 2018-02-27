<?php
/*=============================================
=            Show Debug Display               =
=============================================*/

ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*=====  End of Show Debug Display     ======*/

/*=============================================
=            include core and aplication               =
=============================================*/

include_once "Config/config.php";
include_once "Core/Route.php";
include_once "Core/View.php";
include_once "Core/Functions/Bcrypt.php";
include_once "Model/CreateModels.php";
include_once "Model/RelationsModel.php";
include_once "Model/DBStart.php";
include_once "Helper/helper.php";

/*=====  End of include core and aplication     ======*/
include_once "Config/function.php";

// run File Model
$rundatajson = new Model\CreateModels();
$rundatajson->boot();
$rundatajsonrelation = new Model\RelationsModel();
$rundatajsonrelation->boot();
if (defined('RunDBStart') && RunDBStart) {
    $rundataDBStart = new Model\DBStart();
    $rundataDBStart->boot();
}
$app = new Core\Route();
return $app->route();
