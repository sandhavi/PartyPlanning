<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <style>
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            animation: fadeIn 0.5s ease-out;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 2rem;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .reservation-item {
            background: #e3e4e6;
            border-left: 5px solid #4a69bd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .reservation-item:hover {
            transform: translateY(-5px);
        }

        .reservation-item p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .reservation-item i {
            margin-right: 10px;
            color: #4a69bd;
        }

        .no-reservation {
            text-align: center;
            font-size: 18px;
            color: #888;
        }

        .back-button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4a69bd;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #3b4d8c;
        }

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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    
 <?php
session_start();

if (isset($_SESSION['id'])) {
    include '../../Include/connectin.php';
    $userId = $_SESSION['id'];
    $sql = "SELECT name FROM customer WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, get the name
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    } else {
        // User not found, set a default name
        $userName = "Log In";
    }
    $conn->close();
} else {
    $userName = "Log In";
}
?>
    <div class="container">
        <h1 class="title">Reservation Details</h1>
        <div class="form-container" id="reservationForm">
            <?php
            include('../../Include/connectin.php');
            $sql = "SELECT * FROM reservation WHERE customer_id = $userId ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

            
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="reservation-item">';
                    echo '<p><i class="fas fa-ticket-alt"></i><strong> Ref Number:</strong> ' . $row['id'] . '</p>';
                    echo '<p><i class="fas fa-calendar-day"></i><strong> Date:</strong> ' . $row['date'] . '</p>';
                    echo '<p><i class="fas fa-clock"></i><strong> Time:</strong> ' . $row['time'] . '</p>';
                    echo '<p><i class="fas fa-users"></i><strong> Number of Guests:</strong> ' . $row['no_guests'] . '</p>';
                    echo '<p><i class="fas fa-align-left"></i><strong> Description:</strong> ' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p class="no-reservation">No reservations found.</p>';
            }
            $conn->close();
            ?>
        </div>
        <button class="back-button" onclick="window.location.href='../../Pages/HomePage-Ordinary_User/index.php'">Back to Home</button>
        
    </div>
    <script src="script.js"></script>
</body>

</html>