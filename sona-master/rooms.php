<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Rooms</title>

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

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <!-- Your header code goes here (same as before) -->
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
            <?php
            // Include database connection
            include 'dbcon.php';

            // Fetch room data
            $sql = "SELECT RoomID, RoomType, PricePerNight, Status, Description FROM rooms";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Generate image path based on RoomID (e.g., room-1.jpg, room-2.jpg)
                    $imagePath = 'img/room/room-' . $row['RoomID'] . '.jpg';
                    
                    // Check if the image file exists, else use a default image
                    if (!file_exists($imagePath)) {
                        $imagePath = 'img/room/default.jpg';  // fallback image
                    }

                    // Modify the link to pass the RoomID to booking.php
                    $detailsLink = 'booking.php?room_id=' . $row['RoomID'];

                    echo '
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="' . $imagePath . '" alt="' . htmlspecialchars($row['RoomType']) . '">
                            <div class="ri-text">
                                <h4>' . htmlspecialchars($row['RoomType']) . '</h4>
                                <h3>RM' . number_format($row['PricePerNight'], 2) . '<span>/Per night</span></h3>
                                <p>Status: ' . htmlspecialchars($row['Status']) . '</p>
                                <p>' . htmlspecialchars($row['Description']) . '</p>
                                <a href="' . $detailsLink . '" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p>No rooms available.</p>';
            }

            mysqli_close($conn);
            ?>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

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
