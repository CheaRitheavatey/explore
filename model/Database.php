<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'test';
    private $username = 'root';
    private $password = '';

    public $connection;
    public function connect()
    {
        try {
            $this->connection = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->dbname
            );
        } catch (Exception $e) {
            echo "Connection error" . $e->getMessage();
        }

        return $this->connection;
    }
}
