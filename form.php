<?php
// handle submission form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $route = htmlspecialchars($_POST['route']);

    // database logic

    echo "<div>Thank you $name. Your booking for $route route is successful! </div>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Book Your Cambodia Adventure</h2>
    <form action="form.php" method="POST">
        <!-- name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <!-- email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <!-- date trip -->
        <label for="date">Plan your date:</label>
        <input type="date" id="date" name="date" required>
        <br><br>

        <!-- route -->
        <label for="route">Select your route:</label>
        <select name="route" id="route" require onchange="document.getElementById('route-info').innerHTML = routeDescription[this.value]">
            <option value="temple_route">Temple Route</option>
            <option value="city_route">Temple Route</option>
            <option value="beach_route">Temple Route</option>
            <option value="forest_route">Temple Route</option>
            <option value="full_route">Temple Route</option>
        </select>
        <div class="route-info"></div>
        <br>

        <input type="submit" value="Book Now">

    </form>

    <script>
        var routeDescription = {
            "temple_route": "<strong>Temple Route:</strong><br>Siem Reap &rarr; Angkor Wat &rarr; Bayon Temple<br>Duration: 3 days",
            "forest_route": "<strong>Forest Route:</strong><br>Phnom Kulen &rarr; Kirirom National Park &rarr; Bayon Temple<br>Duration: 2 days",
            "city_route": "<strong>Temple Route:</strong><br>Phnom Penh &rarr; Local Markets &rarr; Royal Palace<br>Duration: 3 days",
            "beach_route": "<strong>Beach Route:</strong><br>Sihanoukville &rarr; Koh Rong &rarr; Koh Sdach Island<br>Duration: 3 days",
            "full_route": "<strong>Full Route:</strong><br>Temple + Forest + City + Sea/Beach <br>Duration: 7 days"

        };
    </script>

</body>

</html>