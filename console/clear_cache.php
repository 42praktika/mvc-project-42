<?php

declare(strict_types=1);


use app\core\Template;

const PROJECT_DIR = __DIR__ . "/../";

spl_autoload_register(function ($classname) {
    require str_replace("app\\", PROJECT_DIR, $classname) . ".php";
});

Template::ClearCache();