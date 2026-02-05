<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'mudb');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all the food donation data
$sql = "SELECT foodname, address, phoneno, quantity FROM donate";
$result = $conn->query($sql);

// Check if there are any records
$donationData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $donationData[] = $row; // Add each row to the donationData array
    }
}

// Close the connection
$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($donationData);
?>
