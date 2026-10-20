<?php 
    namespace App\Core;

    class Database {
        private $connection;

        public function getConnection() {
            $config = require __DIR__ . '/../../config/database.php';

            $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8mb4";

            $this->connection = new \PDO(
                $dsn,
                $config['username'],
                $config['password']
            );

            $this->connection->setAttribute(
                \PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION
            );

            $this->connection->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );

            return $this->connection;
        }
    }
?>