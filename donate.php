<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Food</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Donate Food</h1>
        <form action="connect.php" method="POST">
            <label for="food_name">Food Name:</label>
            <input type="text" id="food_name" name="food_name" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="donor_name">Donor Name:</label>
            <input type="text" id="donor_name" name="donor_name" required>

            <label for="donor_contact">Contact Info:</label>
            <input type="text" id="donor_contact" name="donor_contact" required>

            <button type="submit">Donate</button>
        </form>
    </div>
</body>
</html>
