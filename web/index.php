<?php

use app\controllers\MainController;
use app\core\Application;
use app\core\ConfigParser;
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

date_default_timezone_set("Europe/Moscow");
ConfigParser::load();
$app_env = getenv("APP_ENV");
if ($app_env=="dev") {
    error_reporting(E_ALL);
    ini_set("display_errors", "1");
    ini_set("log_errors", "1");
    ini_set("error_log", PROJECT_DIR."/runtime/logs/".getenv("PHP_LOG"));
}

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