<?php
require_once "../../controller/BookingController.php";

$action = $_GET['action'] ?? 'form';
$controller = new BookingController();

if ($action === 'submit') {
    $controller->submitForm();
} else {
    include "../../view/booking/form.php";
}
