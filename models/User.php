<?php

declare(strict_types=1);

namespace app\models;

use app\core\DBModel;

class User extends DBModel
{

    function getTableName(): string
    {
      return "users";
    }

    function getAttributes(): array
    {
       return ["first_name", "second_name", "age", "job", "email"];
    }
}