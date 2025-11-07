<?php
include 'connection.php';
// handle submission form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $route = htmlspecialchars($_POST['route']);

    // database logic
    $sql = "insert into booking(name,email,trip_date,route) values('$name', '$email', '$date', '$route')";
    if ($connection->query($sql) === TRUE) {
        echo "<div>Thank you, $name. Your booking $route is successful!</div>";
    } else {
        echo "<div>Error: " . $connection->error . " </div>";
    }
    echo "<div>Thank you $name. Your booking for $route route is successful! </div>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <header>
        <div class="logo">Discover Cambodia</div>
        <nav>
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <div class="dropdown">
                <a href="gallery.html" class="dropbtn">Gallery</a>
                <div class="dropdown-content">
                    <a href="city.html">City</a>
                    <a href="city.html">Forest</a>
                    <a href="city.html">Sea/Beach</a>
                    <a href="city.html">Temple</a>
                </div>
            </div>
            <a href="form.php" class="active">Book Now</a>
        </nav>
    </header>
    <div class="container-form">
        <div class="booking-form">
            <h2>Book Your Cambodia Adventure</h2>
            <form action="form.php" method="POST">
                <div class="form">
                    <!-- name -->
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required />
                </div>

                <!-- email -->
                <div class="form">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                </div>

                <!-- date trip -->
                <div class="form">
                    <label for="date">Plan your date:</label>
                    <input type="date" id="date" name="date" required />
                </div>

                <div class="form">
                    <!-- route -->
                    <label for="route">Select your route:</label>
                    <select
                        name="route"
                        id="route"
                        required
                        onchange="updateRoute(this.value)">
                        <option value="temple_route">Temple Route</option>
                        <option value="city_route">City Route</option>
                        <option value="beach_route">Beach Route</option>
                        <option value="forest_route">Forest Route</option>
                        <option value="full_route">Full Route</option>
                    </select>
                    <div class="route-info"></div>
                </div>

                <input type="submit" value="Book Now" class="submit-btn-form" />
            </form>
            <div class="message" id="msg"></div>
        </div>

        <!-- left side for detail of the trip route -->
        <div class="route-visualization">
            <h3>Your Adventure Route</h3>
            <div class="route-map" id="route-map"></div>
            <div class="route-detail" id="route-detail"></div>
        </div>
    </div>

    <script>
        const routeDescription = {
            temple_route: {
                name: "Temple Route",
                description: "Explore the magnificent ancient temples of Cambodia",
                duration: "7 days",
                locations: [{
                        name: "Siem Reap",
                        icon: "fa-city",
                        description: "Starting point for temple exploration",
                    },
                    {
                        name: "Angkor Wat",
                        icon: "fa-torii-gate",
                        description: "Largest religious monument in the world",
                    },
                    {
                        name: "Bayon Temple",
                        icon: "fa-monument",
                        description: "Famous for its smiling stone faces",
                    },
                ],
            },
            forest_route: {
                name: "Forest Route",
                description: "Immerse yourself in Cambodia's lush natural landscapes",
                duration: "2 days",
                locations: [{
                        name: "Phnom Kulen",
                        icon: "fa-mountain",
                        description: "Sacred mountain with waterfalls",
                    },
                    {
                        name: "Kirirom National Park",
                        icon: "fa-tree",
                        description: "Pine forest with hiking trails",
                    },
                    {
                        name: "Bayon Temple",
                        icon: "fa-monument",
                        description: "Famous for its smiling stone faces",
                    },
                ],
            },
            city_route: {
                name: "City Route",
                description: "Experience the vibrant urban life of Cambodia",
                duration: "3 days",
                locations: [{
                        name: "Phnom Penh",
                        icon: "fa-city",
                        description: "Capital city with rich history",
                    },
                    {
                        name: "Local Markets",
                        icon: "fa-store",
                        description: "Experience authentic Cambodian culture",
                    },
                    {
                        name: "Royal Palace",
                        icon: "fa-landmark",
                        description: "Official residence of the King",
                    },
                ],
            },
            beach_route: {
                name: "Beach Route",
                description: "Relax on Cambodia's beautiful beaches and islands",
                duration: "3 days",
                locations: [{
                        name: "Sihanoukville",
                        icon: "fa-umbrella-beach",
                        description: "Coastal city with beautiful beaches",
                    },
                    {
                        name: "Koh Rong",
                        icon: "fa-water",
                        description: "Tropical island paradise",
                    },
                    {
                        name: "Koh Sdach Island",
                        icon: "fa-island-tropical",
                        description: "Remote island with pristine beaches",
                    },
                ],
            },
            full_route: {
                name: "Full Route",
                description: "Complete Cambodian experience covering all highlights",
                duration: "7 days",
                locations: [{
                        name: "Temples",
                        icon: "fa-torii-gate",
                        description: "Ancient temple complexes",
                    },
                    {
                        name: "Forests",
                        icon: "fa-tree",
                        description: "Lush national parks",
                    },
                    {
                        name: "Cities",
                        icon: "fa-city",
                        description: "Urban cultural experiences",
                    },
                    {
                        name: "Beaches",
                        icon: "fa-umbrella-beach",
                        description: "Coastal relaxation",
                    },
                ],
            },
        };

        // update route base on what user pick
        function updateRoute(route) {
            const routeData = routeDescription[route];
            const routeMap = document.getElementById("route-map");
            const routeDetail = document.getElementById("route-detail");

            // clear previous content
            routeMap.innerHTML = "";
            routeDetail.innerHTML = "";

            // make route path
            const routePath = document.createElement("div");
            routePath.className = "route-path";

            // add location to route path
            routeData.locations.forEach((location, index) => {
                const locationElement = document.createElement("div");
                locationElement.className = "location";

                locationElement.innerHTML = `
            <div class="location-icon">
                <i class="fas ${location.icon}"></i>
            </div>
            <div class="location-info">
                <h4>${location.name}</h4>
                <p>${location.description}</p>
            </div>
            `;

                routePath.appendChild(locationElement);

                // add line to connect places -> take the length - 1 cuz we dont connect the last element to anything
                if (index < routeData.locations.length - 1) {
                    const connect = document.createElement("div");
                    connect.className = "connect";
                    routePath.appendChild(connect);
                }
            });

            routeMap.appendChild(routePath);

            // update route detial
            routeDetail.innerHTML = `
        <h3>${routeData.name}</h3>
        <p>${routeData.description}</p>
        <p>Duration: <strong>${routeData.duration}</strong></p>

        `;
        }
        // initalize default route
        document.addEventListener("DOMContentLoaded", function() {
            updateRoute("temple_route");
        });
    </script>
</body>

</html>