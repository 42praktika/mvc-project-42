<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileException;

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
        } catch (FileException $e) {
            echo $e->getMessage();
            Application::$app->getResponse()->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
        echo "Success";
    }

    /**
     * @throws FileException
     */
    private function writeBody(array $getBody): void
    {
        $filename = PROJECT_DIR . "/runtime/body.txt";
        $f = @fopen($filename, "rb+");
        if (!$f) {
            throw new FileException($filename, "Can't open output file");
        };
        try {
            foreach ($getBody as $key => $value) {

                fwrite($f, "$key=$value&");
            }


            ftruncate($f, ftell($f)-1 );
        } catch (\Exception $e) {

            throw new FileException($filename,"Can't write data", previous: $e);
        }
        fclose($f);
    }


}