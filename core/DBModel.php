<?php

declare(strict_types=1);

namespace app\core;

abstract class DBModel extends Model
{
    abstract function getTableName(): string;

    abstract function getAttributes(): array;

    private array $fields;

    private function prepare(string $query): \PDOStatement
    {
        return Application::$app->getDatabase()->getPdo()->prepare($query);
    }

    public function save(): void
    {
        $table = $this->getTableName();
        $attributes = $this->getAttributes();
        $params = array_map(fn($attribute) => ":$attribute", $attributes);
        $query = "INSERT INTO $table(" . implode(",", $attributes) . ") VALUES (" . implode(",", $params) . ")";
        $statement = $this->prepare($query);
        $statement->execute($this->fields);
    }

    public function assign(array $data): DBModel
    {
        $attributes = $this->getAttributes();
        foreach ($data as $key => $value) {
            if (!in_array($key, $attributes)) {
                continue;
            }
            $this->fields[":$key"] = $value;

        }
        return $this;
    }
}