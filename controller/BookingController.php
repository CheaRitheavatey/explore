<?php
require_once "../../model/Booking.php";

class BookingController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function submitForm()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $trip_date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $route = filter_input(INPUT_POST, 'route', FILTER_SANITIZE_STRING);

        $booking = new Booking($this->connection);
        $booking->name = $name;
        $booking->email = $email;
        $booking->trip_date = $trip_date;
        $booking->route = $route;

        if ($booking->create()) {
            // Success, redirect or show message
            echo "<div>Thank you, $name. Your booking for $route is successful!</div>";
        } else {
            echo "<div>Error occurred during booking.</div>";
        }
    }
}
