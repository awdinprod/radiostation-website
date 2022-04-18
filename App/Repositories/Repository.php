<?php

namespace App\Repositories;

use \Exception;
use App\Core\DBConnection;

class Repository
{
    protected $pdo;

    public function __construct()
    {
        try {
            $connection = new DBConnection();
        } catch (\Exception $e) {
            print "Error!: " . $e->getMessage();
            die();
        }

        $this->pdo = $connection->getPDO();
    }
}
