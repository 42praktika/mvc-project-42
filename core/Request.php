<?php

declare(strict_types=1);

namespace app\core;

class Request
{

    public const GET = "GET";
    public const POST = "POST";

    public function getUri(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getBody(): array
    {
        $body = [];
        if ($this->getMethod() == self::GET) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->getMethod() == self::POST) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}