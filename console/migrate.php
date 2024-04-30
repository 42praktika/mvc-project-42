<?php

declare(strict_types=1);

use app\core\ConfigParser;
use app\core\Database;
use function app\migrations\getMigrations;

const PROJECT_DIR = __DIR__ . "/../";

spl_autoload_register(function ($classname) {
    require str_replace("app\\", PROJECT_DIR, $classname) . ".php";
});

require PROJECT_DIR."/migrations/AllMigrations.php";

$migrations = getMigrations();
echo sprintf("Найдено %s миграций%s", count($migrations), PHP_EOL);

ConfigParser::load();
$database = new Database($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
try {
    $maxver = $database->getPdo()->query("SELECT max(version) FROM migrations")->fetch(PDO::FETCH_NUM)[0];
}
catch (Exception $exception) {
    $maxver = -1;
}
echo sprintf("Текущая версия: %s%s", $maxver, PHP_EOL);

foreach ($migrations as $migration) {
    if ($migration->getVersion()<=$maxver) {continue;}
    echo sprintf("Применяем миграцию номер %s%s", $migration->getVersion(), PHP_EOL);
    $migration->setDatabase($database);
    $migration->up();
}