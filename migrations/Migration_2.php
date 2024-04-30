<?php

declare(strict_types=1);

namespace app\migrations;

use app\core\Migration;

class Migration_2 extends Migration
{

    function getVersion(): int
    {
        return 2;
    }

    function up(): void
    {
        $this->database->getPdo()->query("ALTER TABLE users ALTER COLUMN phone TYPE varchar(50)");

        parent::up();
    }

    function down(): void
    {
        $this->database->getPdo()->query("ALTER TABLE users ALTER COLUMN phone TYPE varchar(15)");
    }
}