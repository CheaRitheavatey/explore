<?php
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';


$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("connection failed: " . $connection->connect_error);
}
