<?php

declare(strict_types=1);

namespace app\core;

class Database
{

    private \PDO $pdo;
 public function __construct($dsn, $login, $password)
 {
   $this->pdo = new \PDO($dsn, $login, $password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);


 }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}