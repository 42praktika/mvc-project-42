<?php

namespace app\core;
use app\core\Router;
use app\core\Request;
class Application
{
    public static Application $app;
    private Request $request;
    private Router $router;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * @return \app\core\Request
     */
    public function getRequest(): \app\core\Request
    {
        return $this->request;
    }

    /**
     * @return \app\core\Router
     */
    public function getRouter(): \app\core\Router
    {
        return $this->router;
    }

    public function run() {
        $this->router->resolve();
    }


}