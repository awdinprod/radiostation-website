<?php
    namespace App\core;

    class DBconnection{
        protected $dbname;
        protected $host;
        protected $port;
        protected $username;
        protected $password;
        protected $charset;
        protected $pdo;

        public function getPdo() {
            return $this->pdo;
        }

        public function __construct (){
            require '../app/configuration/database-config.php';

            $this->dbname = DB_NAME;
            $this->host = DB_HOST;
            $this->port = DB_PORT;
            $this->username = DB_USERNAME;
            $this->password = DB_PASSWORD;

            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";
            try {
                $this->pdo = new \PDO($dsn, $this->username, $this->password, $options);
            }
            catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }
?>