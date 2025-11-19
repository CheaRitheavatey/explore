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
        $this->connection = null;
        try {
            $this->connection = new mysqli($host, $username, $password, $dbname);
        } catch (Exception $e) {
            echo "Connection error" . $e->getMessage();
        }

        return $this->connection;
    }
}
