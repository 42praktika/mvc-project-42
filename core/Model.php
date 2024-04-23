<?php

declare(strict_types=1);

namespace app\core;

abstract class Model
{
    public function loadData(array $data): Model
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }
            $this->$key = $value;
        }
        return $this;
    }

}