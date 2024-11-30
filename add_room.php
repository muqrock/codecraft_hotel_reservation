<?php
// Database connection
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$dbname = 'hotel_management'; // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $roomType = $_POST['roomType'];
    $pricePerNight = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    // Generate a unique RoomID (e.g., based on current timestamp)
    $roomID = 'RM' . time();

    // Prepare SQL query to insert data
    $sql = "INSERT INTO rooms (RoomID, RoomType, PricePerNight, Status, Description) 
            VALUES ('$roomID', '$roomType', '$pricePerNight', '$status', '$description')";

    // Execute the query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo "New room added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>