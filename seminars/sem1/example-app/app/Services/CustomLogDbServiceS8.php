<?php

namespace App\Services;

class CustomLogDbServiceS8 implements CustomLogServiceS8Interface
{
    protected $queryBuilder;

    public function __construct($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function rotateLogs()
    {
        $this->queryBuilder->where('id', '<', 1000)->delete();
    }
}
