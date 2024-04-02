<?php

declare(strict_types=1);

namespace app\core;

use app\core\Request;

class Router
{

    private $routes;
    private Request $request;

    public function __construct(Request $request)
    {
        $this->routes = [Request::GET => [], Request::POST => []];
        $this->request = $request;
    }

    public function setGetRoute(string $path, string|array $callback): void
    {
        $this->routes[Request::GET][$path] = $callback;
    }

    public function setPostRoute(string $path, string|array $callback): void
    {
        $this->routes[Request::POST][$path] = $callback;
    }

    public function resolve(): void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri();
        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            $this->renderStatic("404.html");
            return;
        }
        $callback = $this->routes[$method][$path];
        if (is_string($callback)) {
            $this->renderView($callback);
        } else {
            call_user_func($callback, $this->request);
        }
    }

    public function renderStatic(string $name): void
    {
        require PROJECT_DIR . "/web/" . $name;
    }


    public function renderView(string $name): void
    {
        require PROJECT_DIR."/views/".$name.".php";
    }

}