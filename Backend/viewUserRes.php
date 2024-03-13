<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon-icon.svg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>Reservation Box</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('./images/admin5.webp');
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #333;
        }

        .reservation-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            background-color: #fff;
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
            color: #555;
            line-height: 1.5;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            color: #39004b;
            font-weight: bold;

 
        }

        .reservation-box hr {
            border-color: #eee;
        }

 
        .reservation-box i {
            margin-right: 8px;
            font-family: Arial, Helvetica, sans-serif;
            color: #013220;
  
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

        .reservation-box {
            animation: fadeIn 0.5s ease-out;
        }


        .reservation-box p {
            margin-bottom: 15px;
        }


        .reservation-box p span {
            font-weight: bold;

        }


        @media (max-width: 768px) {
            .reservation-box {
                width: 90%;
                padding: 15px;
            }
        }
    </style>

</head>

<body>
    <?php
    include '/xampp/htdocs/PartyPlanning/Include/connectin.php';




    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];


        $sql = "SELECT * FROM reservation WHERE customer_id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            echo '<div class="reservation-box">';
            while ($row = $result->fetch_assoc()) {
                echo "<p>Reservation ID: <i>{$row['id']}</i></p>";
                echo "<p>Date: <i>{$row['date']}</i></p>";
                echo "<p>Time: <i>{$row['time']}</i></p>";
                echo "<p>Description: <i>{$row['description']}</i></p>";
                echo "<p>Location: <i>{$row['venue']}</i> </p>";
                echo "<p>Number of Guests: <i>{$row['no_guests']}</i></p>";
                echo "<p>Reservation Status: <i>{$row['status']}</i></p>";
                echo "<hr>";
    
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
     <?php
        include './back.php'
        ?>
</body>

</html>