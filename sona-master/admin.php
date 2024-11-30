<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Google Fonts and CSS links -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Basic Admin Dashboard Styles */
        .admin-dashboard {
            padding: 30px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .card {
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-weight: bold;
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .btn-action {
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <!-- Admin Dashboard Begin -->
    <div class="admin-dashboard container">
        <h2 class="text-center mb-4">Admin Dashboard</h2>

        <!-- Room Management -->
        <div class="card">
            <div class="card-header">Room Availability Management</div>
            <div class="card-body">
                <p>Manage the availability of rooms. Add, update, or remove room information as needed.</p>
                <a href="manageRoom.php" class="btn btn-primary btn-action">Manage Rooms</a>
            </div>
        </div>

        <!-- Guest Management -->
        <div class="card">
            <div class="card-header">Guest Management</div>
            <div class="card-body">
                <p>View and manage guest information. Track bookings and update guest details.</p>
                <a href="manageGuest.php" class="btn btn-success btn-action">Manage Guests</a>
            </div>
        </div>

        <!-- Event Management -->
        <div class="card">
            <div class="card-header">Event Management</div>
            <div class="card-body">
                <p>Organize and manage events within the hotel. Add or update event details.</p>
                <a href="manageEvent.php" class="btn btn-warning btn-action">Manage Events</a>
            </div>
        </div>

        <!-- Payment Tracking -->
        <div class="card">
            <div class="card-header">Payment Tracking</div>
            <div class="card-body">
                <p>Monitor and track payments. View pending and completed transactions.</p>
                <a href="paymentTracking.php" class="btn btn-info btn-action">Track Payments</a>
            </div>
        </div>

        <!-- Reporting -->
        <div class="card">
            <div class="card-header">Reports</div>
            <div class="card-body">
                <p>Generate and view reports related to room bookings, payments, and more.</p>
                <a href="report.html" class="btn btn-danger btn-action">View Reports</a>
            </div>
        </div>
    </div>
    <!-- Admin Dashboard End -->

    <!-- Scripts -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>