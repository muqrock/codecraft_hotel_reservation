<?php
// Include your database connection
include 'DBcon.php';

// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$preferences = $_POST['preferences'];

$roomID = $_POST['room_id'];
$roomType = $_POST['room_type'];
$checkIn = $_POST['check_in'];
$checkOut = $_POST['check_out'];
$guests = $_POST['guests'];
$totalAmount = $_POST['total_amount'];

// Insert guest information into the guest table
$guestSQL = "INSERT INTO guests (FullName, Email, PhoneNumber, Address, Preferences) 
             VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($guestSQL);
if ($stmt === false) {
    die('Error preparing the query: ' . $conn->error);
}
$stmt->bind_param("sssss", $name, $email, $phone, $address, $preferences);
$stmt->execute();
if ($stmt->error) {
    die('Error executing query: ' . $stmt->error);
}
$guestID = $stmt->insert_id; // Get the GuestID of the last inserted guest

// Insert booking details into the roombookings table
$bookingSQL = "INSERT INTO roombookings (GuestID, RoomID, CheckInDate, CheckOutDate, TotalAmount, BookingStatus, PaymentStatus)
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$bookingStatus = "Pending"; // Initial booking status
$paymentStatus = "Pending"; // Payment status

$stmt = $conn->prepare($bookingSQL);
if ($stmt === false) {
    die('Error preparing the query: ' . $conn->error);
}
$stmt->bind_param("iissdss", $guestID, $roomID, $checkIn, $checkOut, $totalAmount, $bookingStatus, $paymentStatus);
$stmt->execute();
if ($stmt->error) {
    die('Error executing query: ' . $stmt->error);
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Redirect to a confirmation or thank you page
header("Location: thank_you.php"); // Redirect to a page after saving the booking
exit;
?>
