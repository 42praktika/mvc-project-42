<?php

declare(strict_types=1);

namespace app\migrations;

use app\core\Migration;

class Migration_0 extends Migration
{

    function getVersion(): int
    {
        return 0;
    }

    function up(): void
    {
        $this->database->getPdo()->query("CREATE TABLE if not exists users (
                id serial primary key,
                first_name varchar(50),
                second_name varchar(50),
                age int,
                job varchar(300),
                email varchar(100)
            )        
        ");
        parent::up();
    }

    function down(): void
    {
        $this->database->getPdo()->query("DROP TABLE users");
    }
}