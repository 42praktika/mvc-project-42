<?php

declare(strict_types=1);

namespace app\core;

class Response
{
  const HTTP_OK = 200;
  const HTTP_NOT_FOUND = 404;
  const HTTP_SERVER_ERROR = 500;

    /**
     * @param int $status contains HTTP_OK, HTTP_NOT_FOUND or HTTP_SERVER_ERROR
     * @return void
     */
  public function setStatusCode(int $status): void {
      http_response_code($status);

  }
}