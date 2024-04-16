<?php

declare(strict_types=1);

namespace app\core;

use app\exceptions\RouteException;

class Router
{

    private $routes;
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->routes = [Request::GET => [], Request::POST => []];
        $this->request = $request;
        $this->response = $response;
    }

    public function setGetRoute(string $path, string|array $callback): void
    {
        $this->routes[Request::GET][$path] = $callback;
    }

    public function setPostRoute(string $path, string|array $callback): void
    {
        $this->routes[Request::POST][$path] = $callback;
    }

    /**
     * @throws \Exception
     */
    public function resolve(): void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri();
        if (!isset($this->routes[$method][$path])) {
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
            $this->renderStatic("404.html");
           return;
        }
        $callback = $this->routes[$method][$path];
        if (empty($callback)) {
            $this->response->setStatusCode(Response::HTTP_SERVER_ERROR);
            throw new RouteException(route: $path, method:$method, message: "Callback not found");
        }
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