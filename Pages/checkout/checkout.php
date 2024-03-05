<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="form-container">
    <h1>Reservation Details</h1>

    <form id="reservationForm">
      <?php
        include('../../Include/connectin.php');

        $sql = "SELECT * FROM reservation where customer_id = 1 ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="reservation-item">';
                echo '<p><strong>Ref Number:</strong> ' . $row['id'] . '</p>';
                echo '<p><strong>Date:</strong> ' . $row['date'] . '</p>';
                echo '<p><strong>Time:</strong> ' . $row['time'] . '</p>';
                echo '<p><strong>Number of Guests:</strong> ' . $row['no_guests'] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
                // Add more fields as needed
                echo '</div>';
            }
        } else {
            echo '<p>No reservations found</p>';
        }

        $conn->close();
      ?>
    </form>
  </div>
<button onclick="window.location.href='../../Pages/HomePage-Ordinary_User/index.php'">Back</button>
  <script src="script.js"></script>
</body>
</html>
