<?php
    namespace App\repositories;

    class repository{
        protected $pdo;

        public function __construct ($connection){
            $this->pdo = $connection->getPDO();
        }
    }