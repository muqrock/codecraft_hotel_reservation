<?php
// Include database connection
include 'dbcon.php';

// Get the RoomID from the URL
$roomID = isset($_GET['room_id']) ? $_GET['room_id'] : 0;

// Fetch room data for the specific RoomID
$sql = "SELECT RoomID, RoomType, PricePerNight, Status, Description FROM rooms WHERE RoomID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $roomID);  // Bind RoomID as integer
$stmt->execute();
$result = $stmt->get_result();

// Check if the room exists
if ($result->num_rows > 0) {
    $room = $result->fetch_assoc();
    $imagePath = 'img/room/room-' . $room['RoomID'] . '.jpg';

    // Check if the image exists, else use a default image
    if (!file_exists($imagePath)) {
        $imagePath = 'img/room/default.jpg';
    }
} else {
    echo "Room not found!";
    exit;
}

// Handle form submission when the "Booking Now" button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $guests = $_POST['guests'];

    // Check if the room is available for the selected dates
    $availabilitySql = "SELECT * FROM roombookings WHERE RoomID = ? 
                        AND ((CheckInDate BETWEEN ? AND ?) OR (CheckOutDate BETWEEN ? AND ?))";
    $stmt = $conn->prepare($availabilitySql);
    $stmt->bind_param("issss", $roomID, $checkIn, $checkOut, $checkIn, $checkOut);
    $stmt->execute();
    $availabilityResult = $stmt->get_result();

    if ($availabilityResult->num_rows > 0) {
        // Room is not available for the selected dates
        echo "Room is not available for the selected dates.";
    } else {
        // Room is available, calculate the total amount
        $totalAmount = $room['PricePerNight'] * (strtotime($checkOut) - strtotime($checkIn)) / (60 * 60 * 24); // Calculate total amount
        
        // Redirect to payment.php with booking details
        header("Location: payment.php?room_id=" . $room['RoomID'] . "&room_type=" . urlencode($room['RoomType']) . "&check_in=" . $checkIn . "&check_out=" . $checkOut . "&guests=" . $guests . "&total_amount=" . $totalAmount);
        exit;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Room Details</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Room Details</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>Room Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($room['RoomType']); ?>">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3><?php echo htmlspecialchars($room['RoomType']); ?></h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <!-- Button now submits the form to check availability and redirect to payment page -->
                                    <button type="submit" class="primary-btn">Booking Now</button>
                                </div>
                            </div>
                            <h2>RM<?php echo number_format($room['PricePerNight'], 2); ?><span>/Per night</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max person 5</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>King Beds</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>Wifi, Television, Bathroom,...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para"><?php echo nl2br(htmlspecialchars($room['Description'])); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="booking.php?room_id=<?php echo $room['RoomID']; ?>" method="POST">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="date" id="date-in" name="check_in" required>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="date" id="date-out" name="check_out" required>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest" name="guests" required>
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room" name="room" required>
                                    <option value="1">1 Room</option>
                                </select>
                            </div>
                            <!-- Changed button to submit the form and redirect to payment.php -->
                            <button type="submit" class="primary-btn">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <!-- Your footer code goes here -->
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
