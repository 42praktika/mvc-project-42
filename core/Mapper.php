<?php

declare(strict_types=1);

namespace app\core;

use app\models\User;

abstract class Mapper
{
    protected \PDO $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct()
    {
        $this->pdo = Application::$app->getDatabase()->getPdo();
    }

    public function Insert(Model $model): Model
    {
        return $this->doInsert($model);
    }


    public function Update(Model $model): void
    {
        $this->doUpdate();
    }

    public function Delete(int $id): void
    {
        $this->doDelete($id);
    }

    public function Select(int $id): Model
    {
        return $this->createObject($this->doSelect($id));
    }

    public function SelectAll(): Collection {

        return new Collection($this->doSelectAll(), $this->getInstance());
    }

    protected abstract function doInsert(Model $model): Model;

    protected abstract function doUpdate(Model $model): void;

    protected abstract function doDelete(int $id): void;

    protected abstract function doSelect(int $id): array;

    protected abstract function doSelectAll(): array;

    public abstract function getInstance(): Mapper;

    public abstract function createObject(array $data): Model;


}