<?php
require_once "../../model/Database.php";
require_once "../../controller/BookingController.php";

$db = new Database();
$connection = $db->connect();

$controller = new BookingController($connection);
$action = $_GET['action'] ?? 'form';

if ($action === 'submit') {
    $controller->submitForm();
} else {
    include "form.php";
}
