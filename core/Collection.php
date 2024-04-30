<?php

declare(strict_types=1);

namespace app\core;

class Collection
{
   private array $rows;
   private int $count;

   private array $objects = [];

   private Mapper $mapper;

    /**
     * @param array $rows
     * @param int $count
     * @param Mapper $mapper
     */
    public function __construct(array $rows, Mapper $mapper)
    {
        $this->rows = $rows;

        $this->count = count($rows);
        $this->mapper = $mapper;
    }

    public function getRow(int $i): ?Model
    {
        if ($i < 0 || $i >= $this->count) {
            return null;
        }
        if (!array_key_exists($i, $this->objects)) {
            $this->objects[$i] = $this->mapper->createObject($this->rows[$i]);
        }
        return $this->objects[$i];
    }

    public function getNextRow(): \Generator{
        for ($i=0; $i<$this->count; $i++) {
            yield $this->getRow($i);
        }
    }





}