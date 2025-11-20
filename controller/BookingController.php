<?php
class BookingController
{
    public function submitForm()
    {
        // need database and booking
        require_once "config/Database.php";
        require_once "model/Booking.php";

        $database = new Database();
        $db = $database->connect();

        $booking = new Booking($db);

        // assign value
        $booking->name = $_POST['name'];
        $booking->email = $_POST['email'];
        $booking->trip_date = $_POST['date'];
        $booking->route = $_POST['route'];

        if ($booking->create()) {
            include "view/booking/success.php";
        } else {
            echo "<h3>Error, cannot save booking</h3>";
        }
    }
}
