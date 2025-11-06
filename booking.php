<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Cambodia Trip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #fff;
            min-height: 100vh;
        }

        .booking-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .back-button {
            margin-bottom: 30px;
        }

        .back-button a {
            color: #4cc9f0;
            text-decoration: none;
            font-size: 1.1em;
        }

        .back-button a:hover {
            text-decoration: underline;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            background: linear-gradient(90deg, #4cc9f0, #4361ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .package-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .package-card:hover {
            transform: translateY(-10px);
        }

        .package-card.featured {
            border: 2px solid #4cc9f0;
            position: relative;
        }

        .package-card.featured::before {
            content: "POPULAR";
            position: absolute;
            top: -10px;
            right: 20px;
            background: #4cc9f0;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8em;
            font-weight: bold;
        }

        .package-category {
            color: #4cc9f0;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .package-name {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: white;
        }

        .package-price {
            font-size: 2em;
            font-weight: bold;
            color: #4cc9f0;
            margin-bottom: 15px;
        }

        .package-duration {
            color: #ccc;
            margin-bottom: 15px;
        }

        .package-route {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 0.9em;
        }

        .package-included {
            margin-bottom: 20px;
        }

        .package-included ul {
            list-style: none;
            padding-left: 0;
        }

        .package-included li {
            margin-bottom: 5px;
            padding-left: 20px;
            position: relative;
        }

        .package-included li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4cc9f0;
            font-weight: bold;
        }

        .select-package {
            background: linear-gradient(90deg, #4361ee, #4cc9f0);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .select-package:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .booking-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin-top: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4cc9f0;
            font-weight: 500;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1em;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4cc9f0;
        }

        .submit-btn {
            background: linear-gradient(90deg, #ff6b6b, #ff8e53);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .message {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .message.success {
            background: rgba(76, 201, 240, 0.2);
            border: 1px solid #4cc9f0;
            color: #4cc9f0;
        }

        .message.error {
            background: rgba(255, 107, 107, 0.2);
            border: 1px solid #ff6b6b;
            color: #ff6b6b;
        }
    </style>
</head>

<body>
    <div class="booking-container">
        <div class="back-button">
            <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>

        <h1>Book Your Cambodia Adventure</h1>

        <?php
        // Get category from URL or show all
        $category = $_GET['category'] ?? 'all';

        // Fetch packages
        if ($category === 'all') {
            $stmt = $pdo->query("SELECT * FROM tour_packages ORDER BY 
                CASE category 
                    WHEN 'full' THEN 1 
                    WHEN 'temple' THEN 2 
                    WHEN 'city' THEN 3 
                    WHEN 'sea' THEN 4 
                    WHEN 'forest' THEN 5 
                    ELSE 6 
                END");
        } else {
            $stmt = $pdo->prepare("SELECT * FROM tour_packages WHERE category = ? OR category = 'full'");
            $stmt->execute([$category]);
        }

        $packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="packages-grid">
            <?php foreach ($packages as $package): ?>
                <div class="package-card <?php echo $package['category'] === 'full' ? 'featured' : ''; ?>">
                    <div class="package-category"><?php echo ucfirst($package['category']); ?> Package</div>
                    <h2 class="package-name"><?php echo htmlspecialchars($package['name']); ?></h2>
                    <div class="package-price">$<?php echo number_format($package['price_usd'], 2); ?></div>
                    <div class="package-duration"><i class="fas fa-calendar"></i> <?php echo $package['duration_days']; ?> Days</div>

                    <div class="package-route">
                        <strong>Route:</strong><br>
                        <?php echo htmlspecialchars($package['route']); ?>
                    </div>

                    <div class="package-included">
                        <strong>Includes:</strong>
                        <ul>
                            <?php
                            $included_items = explode(',', $package['included']);
                            foreach ($included_items as $item):
                            ?>
                                <li><?php echo trim($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <button class="select-package" onclick="selectPackage(<?php echo $package['id']; ?>, '<?php echo htmlspecialchars($package['name']); ?>')">
                        Select This Package
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="booking-form" id="bookingForm">
            <h2 style="text-align: center; margin-bottom: 30px;">Book Your Trip</h2>

            <?php
            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $package_id = $_POST['package_id'];
                $customer_name = $_POST['customer_name'];
                $customer_email = $_POST['customer_email'];
                $customer_phone = $_POST['customer_phone'];
                $travel_date = $_POST['travel_date'];
                $number_of_people = $_POST['number_of_people'];
                $special_requests = $_POST['special_requests'];

                // Basic validation
                if (!empty($package_id) && !empty($customer_name) && !empty($customer_email)) {
                    try {
                        $stmt = $pdo->prepare("INSERT INTO bookings (package_id, customer_name, customer_email, customer_phone, travel_date, number_of_people, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$package_id, $customer_name, $customer_email, $customer_phone, $travel_date, $number_of_people, $special_requests]);

                        echo '<div class="message success">';
                        echo '<i class="fas fa-check-circle"></i> Thank you for your booking! We will contact you within 24 hours.';
                        echo '</div>';

                        // Clear form
                        $_POST = [];
                    } catch (PDOException $e) {
                        echo '<div class="message error">';
                        echo '<i class="fas fa-exclamation-circle"></i> Sorry, there was an error. Please try again.';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="message error">';
                    echo '<i class="fas fa-exclamation-circle"></i> Please fill in all required fields.';
                    echo '</div>';
                }
            }
            ?>

            <form method="POST" id="tripForm">
                <input type="hidden" name="package_id" id="package_id" required>

                <div class="form-group">
                    <label for="selected_package">Selected Package:</label>
                    <input type="text" id="selected_package" readonly style="background: rgba(255,255,255,0.2);">
                </div>

                <div class="form-group">
                    <label for="customer_name">Full Name *</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($_POST['customer_name'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="customer_email">Email Address *</label>
                    <input type="email" id="customer_email" name="customer_email" value="<?php echo htmlspecialchars($_POST['customer_email'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="customer_phone">Phone Number</label>
                    <input type="tel" id="customer_phone" name="customer_phone" value="<?php echo htmlspecialchars($_POST['customer_phone'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="travel_date">Preferred Travel Date *</label>
                    <input type="date" id="travel_date" name="travel_date" value="<?php echo htmlspecialchars($_POST['travel_date'] ?? ''); ?>" required min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group">
                    <label for="number_of_people">Number of People *</label>
                    <select id="number_of_people" name="number_of_people" required>
                        <option value="">Select...</option>
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo ($_POST['number_of_people'] ?? '') == $i ? 'selected' : ''; ?>>
                                <?php echo $i; ?> person<?php echo $i > 1 ? 's' : ''; ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="special_requests">Special Requests</label>
                    <textarea id="special_requests" name="special_requests" rows="4" placeholder="Any dietary requirements, accessibility needs, or special requests..."><?php echo htmlspecialchars($_POST['special_requests'] ?? ''); ?></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit Booking Request
                </button>
            </form>
        </div>
    </div>

    <script>
        function selectPackage(packageId, packageName) {
            document.getElementById('package_id').value = packageId;
            document.getElementById('selected_package').value = packageName;

            // Scroll to form
            document.getElementById('bookingForm').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Auto-select package from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const autoPackage = urlParams.get('package');
        if (autoPackage) {
            const packageElement = document.querySelector(`[onclick*="${autoPackage}"]`);
            if (packageElement) {
                packageElement.click();
            }
        }
    </script>
</body>

</html>