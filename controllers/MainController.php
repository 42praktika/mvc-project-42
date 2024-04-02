<?php

namespace app\controllers;
use app\core\Application;
use app\core\Request;

class MainController
{
    public function getView(Request $request): void
    {
        Application::$app->getRouter()->renderView("form");
    }

    public function handleView(Request $request): void
    {
        var_dump($request->getBody());
    }

}