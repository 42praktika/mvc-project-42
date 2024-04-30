<?php

declare(strict_types=1);

namespace app\core;

abstract class Migration
{
    abstract function getVersion(): int;

    protected Database $database;

    /**
     * @param Database $database
     */
    public function setDatabase(Database $database): void
    {
        $this->database = $database;
    }

    public function up(): void
    {
        $this->database->getPdo()->query("CREATE TABLE IF NOT EXISTS migrations (version int)");
        $this->database->getPdo()->query("DELETE FROM migrations");
        $this->database->getPdo()->query("INSERT INTO migrations (version) VALUES (" . $this->getVersion() . ")");
    }

    abstract function down(): void;

}