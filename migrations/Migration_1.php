<?php

declare(strict_types=1);

namespace app\migrations;

use app\core\Migration;

class Migration_1 extends Migration
{

    function getVersion(): int
    {
        return 1;
    }

    function up(): void
    {
        $this->database->getPdo()->query("ALTER TABLE users ADD COLUMN phone varchar(15)");

        parent::up();
    }

    function down(): void
    {
        $this->database->getPdo()->query("ALTER TABLE users DROP COLUMN phone");
    }
}