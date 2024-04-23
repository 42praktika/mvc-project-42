<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileException;
use app\models\User;

class MainController
{
    public function getView(Request $request): void
    {
        Application::$app->getRouter()->renderView("form");
    }

    /**
     * @throws \Exception
     */
    public function handleView(Request $request): void
    {

        try {
            $this->writeBody($request->getBody());
        } catch (\Exception $e) {
            Application::$app->getLogger()->error($e);
            Application::$app->getResponse()->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
       Application::$app->getRouter()->renderStatic("success.html");
    }

    /**
     * @throws FileException
     */
    private function writeBody(array $getBody): void
    {
        (new User())->assign($getBody)->save();
    }


}