<?php

require __DIR__ . "/inc/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

//print_r($uri);
 
if ((isset($uri[2]) && (($uri[2] != 'news') && ($uri[2] != 'mcq'))) || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

//echo PROJECT_ROOT_PATH;



//echo PROJECT_ROOT_PATH . "/inc/config.php";

if($uri[2]=='news') {
  require PROJECT_ROOT_PATH . "/controller/api/userController.php";
  $objFeedController = new UserController();

} elseif ($uri[2]=='mcq') {
  require PROJECT_ROOT_PATH . "/controller/api/mcqController.php";
  $objFeedController = new UserController();
  //echo "this works";
}



$strMethodName = $uri[3] . 'Action';
/*
echo $objFeedController->showQueries();
echo "\n";
echo $objFeedController->listAction();
echo "\n";
*/

$objFeedController->{$strMethodName}();

//echo "ThinkEconomics API";

?>