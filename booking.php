<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Cambodia Trip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style></style>
</head>

<body>
    <div class="booking-container">
        <div class="back-button">
            <a href="index.html">Back To Home</a>
        </div>

        <h1>Book Your Cambodia Adventure</h1>

        <?php
        $category = $_GET['category'] ?? 'all';

        // fetch packages
        if ($category === 'all') {
            $statement = $pdo->query("SELECT * FROM tour_packages ORDER BY 
                CASE category 
                    WHEN 'full' THEN 1 
                    WHEN 'temple' THEN 2 
                    WHEN 'city' THEN 3 
                    WHEN 'sea' THEN 4 
                    WHEN 'forest' THEN 5 
                    ELSE 6 
                END");
        } else {
            $statement = $pdo->prepare("SELECT * FROM tour_packages WHERE category = ? OR category = 'full'");
            $statement->execute([$category]);
        }

        $packages = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="package-grid">
            <?php foreach($packages as $package): ?>
                <div class="package-card <?php echo $package['category'] === 'full' ? 'featured' : ''; ?>" >
                    <div class="package-category"><?php echo htmlspecialchars($package['category']); ?> </div>
                    <h2 class="package-name"><?php echo htmlspecialchars($package['name']); ?></h2>
                    <div class="package-price"><?php echo number_format($package['price_usd'],2); ?> </div>
                    <div class="package-duration"><?php echo $package['duration_day']; ?> Days</div>
                </div>
        </div>
    </div>

</body>

</html>