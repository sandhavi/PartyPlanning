<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Reservation Box</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: ghostwhite;
            color: #333;
        }

        .reservation-box {
            border: 1px solid #39004b;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            background-color: transparent;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .reservation-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Typography & Colors */
        .reservation-box p {
            color:#333;
            line-height: 1.5;
        }

        .reservation-box p:first-child {
            margin-top: 0;
        }

        .reservation-box p:last-child {
            margin-bottom: 0;
        }

        /* Icons using FontAwesome - Ensure you include FontAwesome in your HTML */
        .reservation-box i {
            margin-right: 8px;
            color: #39004b;
           
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reservation-box {
            animation: fadeIn 0.5s ease-out;
        }

        /* Additional Styling */
        /* Specific styling for Reservation ID label and value */
        .reservation-box p.reservation-id-label {
            color: #39004b; /* Set font color to blue */
            font-weight: bold; /* Optionally make it bold */
            display: inline-block; /* Ensure both labels and values are in the same line */
        }

        .reservation-box p.reservation-id-value {
            color: black; /* Set font color to red */
            display: inline-block; /* Ensure both labels and values are in the same line */
            padding-left: 20px;
        }

        /* Feel free to add more styles as needed */
    </style>
</head>

<body>
    <?php
    include '../Include/connectin.php';
    session_start();

    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];

        // Fetch reservation data for the logged-in user
        $sql = "SELECT * FROM reservation WHERE customer_id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display reservation data in a box
            echo '<div class="reservation-box">';
            while ($row = $result->fetch_assoc()) {
                echo "<p class='reservation-id-label'>Reservation ID:</p>";
                echo "<p class='reservation-id-value'>{$row['id']}</p>";
                echo "<p>Date: {$row['date']}</p>";
                echo "<p>Time: {$row['time']}</p>";
                echo "<p>Description: {$row['description']}</p>";
                echo "<p>Description: {$row['venue']}</p>";
                echo "<p>Number of Guests: {$row['no_guests']}</p>";
                echo "<p>Reservation Status: {$row['status']}</p>";

                // Add more fields as needed
            }
            echo '</div>';
        } else {
            echo '<p>No reservations found for the logged-in user.</p>';
        }

        $conn->close();
    } else {
        echo '<p>User not logged in.</p>';
    }
    ?>
</body>

</html>
