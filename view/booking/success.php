<?php
include "view/template/header.php"
?>

<h2>Booking Successful!</h2>
<p>Thank you, <?php echo htmlspecialchars($booking->name); ?> </p>
<p>Your booking for <?php echo htmlspecialchars($booking->route); ?> is confirmed. </p>