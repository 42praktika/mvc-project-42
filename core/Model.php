<?php

declare(strict_types=1);

namespace app\core;

abstract class Model
{
   protected ?int $id;

   public function __construct(?int $id)
   {
       $this->id = $id;
   }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}