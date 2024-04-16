<?php

declare(strict_types=1);

namespace app\core;

use app\exceptions\RouteException;

class Application
{
    public static Application $app;
    private Request $request;
    private Router $router;
    private Response $response;

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->response->setStatusCode(Response::HTTP_OK);
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * @throws RouteException Undefined method
     */
    public function setRoute(string $method, string $path, string|array $callback): void
    {
        switch ($method) {
            case Request::GET:
                $this->router->setGetRoute($path, $callback);
                break;

            case Request::POST:
                $this->router->setPostRoute($path, $callback);
                break;
            default:
            {
                $this->response->setStatusCode(Response::HTTP_SERVER_ERROR);
                throw new RouteException($path, $method, "Unknown method");
            }
        }
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {

        try {
            $this->router->resolve();
        } catch (RouteException $e) {
            echo "Route error: " . $e->getMessage();

        } catch (\Exception $e) {
            echo "Generic error: " . $e->getMessage();
        }
    }


}