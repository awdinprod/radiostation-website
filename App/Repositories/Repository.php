<?php

namespace App\Repositories;

class Repository
{
    protected $pdo;

    public function __construct($connection)
    {
        $this->pdo = $connection->getPDO();
    }
}
