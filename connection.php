<?php
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $connection = mysqli_connect($host, $username, $password, $dbname);
} catch (Exception $e) {
    echo "something wrong!" . $e->getMessage();
}
