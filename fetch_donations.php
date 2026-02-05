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

$sql = "SELECT * FROM donations WHERE status = 'available'";
$result = $conn->query($sql);

$donations = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $donations[] = $row;
    }
}

echo json_encode($donations);

$conn->close();
?>
