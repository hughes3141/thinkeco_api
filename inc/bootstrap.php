<?php

define("PROJECT_ROOT_PATH", __DIR__ . "/../");

$path = $_SERVER['DOCUMENT_ROOT'];
//define("PROJECT_ROOT_PATH", $path);

// include main configuration file
require_once PROJECT_ROOT_PATH . "/inc/config.php";
 
// include the base controller file
require_once PROJECT_ROOT_PATH . "/controller/api/baseController.php";
 
// include the use model file
require_once PROJECT_ROOT_PATH . "/model/userModel.php";
?>