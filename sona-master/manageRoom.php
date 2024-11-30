<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <style>body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

.room-list, .room-form, .room-update {
    margin-bottom: 20px;
}

.room-list ul {
    list-style-type: none;
    padding: 0;
}

.room-list li {
    margin-bottom: 5px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input, select {
    padding: 5px;
    margin-bottom: 10px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}</style>
</head>
<body>
    <div class="container">
        <h1>Room Management</h1>

        <div class="room-list">
            <h2>Available Rooms</h2>
            <ul>
                <li>Room 101 - Available</li>
                <li>Room 102 - Occupied</li>
                <li>Room 103 - Available</li>
                </ul>
        </div>

        <div class="room-form">
            <h2>Assign Room</h2>
            <form>
                <label for="guestName">Guest Name:</label>
                <input type="text" id="guestName" name="guestName">

                <label for="checkIn">Check-in Date:</label>
                <input type="date" id="checkIn" name="checkIn">

                <label for="checkOut">Check-out Date:</label>
                <input type="date" id="checkOut" name="checkOut">

                <button type="submit">Assign Room</button>
            </form>
        </div>

        <div class="room-update">
            <h2>Update Room Status</h2>
            <label for="roomId">Room ID:</label>
            <input type="text" id="roomId" name="roomId">

            <label for="newStatus">New Status:</label>
            <select id="newStatus" name="newStatus">
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Under Maintenance</option>
            </select>

            <button type="submit">Update</button>
        </div>
    </div>
</body>
</html>