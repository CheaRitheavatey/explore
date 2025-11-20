<?php
class Booking
{
    private $connection;
    private $table = "booking";

    public $name;
    public $email;
    public $trip_date;
    public $route;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create()
    {
        $statement = $this->connection->prepare("
        insert into $this->table (name,email,trip_date, route)
        values (?,?,?,?)
        ");

        $statement->bind_param(
            "ssss",
            $this->name,
            $this->email,
            $this->trip_date,
            $this->route
        );

        return $statement->execute();
    }
}
