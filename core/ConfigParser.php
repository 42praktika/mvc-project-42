<?php
declare(strict_types=1);

namespace app\core;

class ConfigParser
{
  public static function load(): void {
      if (!file_exists(PROJECT_DIR."/.env")) {
          return;
      }
      $config = file(PROJECT_DIR."/.env", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      foreach ($config as $value) {
          $value = trim($value);
          if (str_starts_with($value, '#' )){continue;}
          $kvp = explode("=", $value, 2);
          $kvp[0] = rtrim($kvp[0]);
          $kvp[1] = ltrim($kvp[1]);
          $_ENV[$kvp[0]] = $kvp[1];
          $_SERVER[$kvp[0]] = $kvp[1];
          putenv($kvp[0]."=".$kvp[1]);
      }
  }
}