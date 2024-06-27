<?php
namespace Src\System;

class DatabaseConnector
{
    private $dbConnection = null;

    public function __construct()
    {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $db   = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');

        try {
            $this->dbConnection = new \PDO(
                sprintf("mysql:host=$host;port=$port;charset=UTF8;dbname=$db"),
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
