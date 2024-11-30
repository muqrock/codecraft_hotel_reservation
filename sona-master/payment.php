<?php
// Retrieve the booking details from the URL
$roomID = isset($_GET['room_id']) ? $_GET['room_id'] : '';
$roomType = isset($_GET['room_type']) ? $_GET['room_type'] : '';
$checkIn = isset($_GET['check_in']) ? $_GET['check_in'] : '';
$checkOut = isset($_GET['check_out']) ? $_GET['check_out'] : '';
$guests = isset($_GET['guests']) ? $_GET['guests'] : '';
$totalAmount = isset($_GET['total_amount']) ? $_GET['total_amount'] : 0;

// Check if the required details are available
if (empty($roomID) || empty($roomType) || empty($checkIn) || empty($checkOut)) {
    echo "Invalid booking details!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Payment Page">
    <meta name="keywords" content="payment, hotel booking, online booking">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment | Hotel Booking</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
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
                        <h2>Payment</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Payment Section Begin -->
    <section class="payment-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-details">
                        <h3>Your Booking Details</h3>
                        <p><strong>Room Type:</strong> <?php echo htmlspecialchars($roomType); ?></p>
                        <p><strong>Check-In Date:</strong> <?php echo htmlspecialchars($checkIn); ?></p>
                        <p><strong>Check-Out Date:</strong> <?php echo htmlspecialchars($checkOut); ?></p>
                        <p><strong>Guests:</strong> <?php echo htmlspecialchars($guests); ?></p>
                        <p><strong>Total Amount:</strong> RM <?php echo number_format($totalAmount, 2); ?></p>

                        <!-- Guest Information Form -->
                        <h3>Enter Your Information</h3>
                        <form id="payment-form" action="process_payment.php" method="POST">
                            <!-- Guest Information Fields -->
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                            <div class="form-group">
                                <label for="preferences">Preferences</label>
                                <input type="text" class="form-control" name="preferences" id="preferences">
                            </div>

                            <!-- Hidden fields for booking details -->
                            <input type="hidden" name="room_id" value="<?php echo $roomID; ?>">
                            <input type="hidden" name="room_type" value="<?php echo $roomType; ?>">
                            <input type="hidden" name="check_in" value="<?php echo $checkIn; ?>">
                            <input type="hidden" name="check_out" value="<?php echo $checkOut; ?>">
                            <input type="hidden" name="guests" value="<?php echo $guests; ?>">
                            <input type="hidden" name="total_amount" value="<?php echo $totalAmount; ?>">

                            <button id="submit" class="btn btn-primary">Save Reservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
