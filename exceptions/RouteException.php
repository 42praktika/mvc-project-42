<?php

namespace app\exceptions;

class RouteException extends \Exception
{
 private string $route;
    private string $method;

    public function __construct(string $route="", string $method="", string $message = "", int $code = 0, ?\Throwable $previous = null)
 {
     $this->route = $route;

     parent::__construct($message, $code, $previous);

     $this->method = $method;
 }

    /**
     * @return string target URI
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return string Http Method
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}