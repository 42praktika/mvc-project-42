<?php

use app\controllers\MainController;
use app\core\Application;

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}
const PROJECT_DIR = __DIR__ . "/../";
require PROJECT_DIR."/vendor/autoload.php";

spl_autoload_register(function ($classname){
    require str_replace("app\\", PROJECT_DIR,$classname).".php";
}) ;

$application = new Application();
$router = $application->getRouter();
$router->setGetRoute("/", [new MainController(), "getView"]);
$router->setPostRoute("/handle", [new MainController(), "handleView"]);

ob_start();
$application->run();
ob_flush();