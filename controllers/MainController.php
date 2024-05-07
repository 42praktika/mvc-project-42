<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\models\User;

class MainController
{
    public function getView(Request $request): void
    {
        Application::$app->getRouter()->renderTemplate("index.html", ["action"=>"handle"]);
    }

    /**
     * @throws \Exception
     */
    public function handleView(Request $request): void
    {
        $users = [];
        try {
           $mapper = new UserMapper();
           $user = $mapper->createObject($request->getBody());
           $mapper->Insert($user);
           $users = $mapper->SelectAll();

        } catch (\Exception $e) {
            Application::$app->getLogger()->error($e);
            Application::$app->getResponse()->setStatusCode(Response::HTTP_SERVER_ERROR);

        }

       Application::$app->getRouter()->renderTemplate("success.html", ["users"=>$users]);
    }




}