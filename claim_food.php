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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE donations SET status='claimed' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Food claimed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
