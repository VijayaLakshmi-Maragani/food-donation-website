<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_donations";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_name = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $donor_name = $_POST['donor_name'];
    $donor_contact = $_POST['donor_contact'];

    $sql = "INSERT INTO donations (food_name, quantity, donor_name, donor_contact) 
            VALUES ('$food_name', '$quantity', '$donor_name', '$donor_contact')";

    if ($conn->query($sql) === TRUE) {
        echo "Donation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
