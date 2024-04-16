<?php

use app\controllers\MainController;
use app\core\Application;
use app\core\Request;
use app\exceptions\RouteException;

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}
const PROJECT_DIR = __DIR__ . "/../";
require PROJECT_DIR . "/vendor/autoload.php";

spl_autoload_register(function ($classname) {
    require str_replace("app\\", PROJECT_DIR, $classname) . ".php";
});

$application = new Application();
//$router = $application->getRouter();


try {
    $application->setRoute(Request::GET, "/", [new MainController(), "getView"]);
    $application->setRoute(Request::GET, "/500err", "");

    $application->setRoute(Request::POST, "/handle", [new MainController(), "handleView"]);
} catch (RouteException $e) {
    //log
    exit;
}



ob_start();
$application->run();
ob_flush();