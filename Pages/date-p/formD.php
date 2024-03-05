<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Form</title>
</head>
<body>
    <h2>Make a Reservation</h2>
    <form action="saveDate.php" method="POST">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <br><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
        <br><br>
        <label for="no_guests">Number of Guests:</label>
        <input type="number" id="no_guests" name="no_guests" required>
        <br><br>
        <button type="submit">Submit Reservation</button>
    </form>
</body>
</html>
