<?php
namespace Src\System;

class DatabaseConnector
{
    private $dbConnection = null;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        try {
            $this->dbConnection = new \PDO(
                sprintf("mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4",$host,$port,$db),
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    

    public function db()
    {
        return $this->dbConnection;
    }
}
