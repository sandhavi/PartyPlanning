<?php
include './Template/header.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Include your database connection file
include './Include/connectin.php';


// Function to get count from the database
function getCount($table, $conn)
{
    $query = "SELECT COUNT(*) AS count FROM $table";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Get counts
$customerCount = getCount('customer', $conn);
$reservationCount = getCount('reservation', $conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            /* Dark background for modern look */
            color: #252525;
            /* Light text for contrast */
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #39004b;
            /* Slightly dimmed color for headings */
            text-align: center;
        }

        .dashboard-container {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #6D7FCC;
            /* Color based on site's primary color */
            text-decoration: none;
            margin-top: 20px;
            display: block;
        }

        a:hover {
            text-decoration: underline;
        }

        .dashboard-box {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }

        .dashboard-box {
            display: inline-block;
            vertical-align: top;
            background-color: #39004b;
            color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: calc(50% - 40px);
            /* Adjust the width as needed, considering margin and padding */
        }

        .dashboard-box h3 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="dashboard-box">
            <h3>Customer Count</h3>
            <p><?php echo $customerCount; ?></p>
        </div>
        <div class="dashboard-box">
            <h3>Reservation Count</h3>
            <p><?php echo $reservationCount; ?></p>
        </div>
        <a href="./Pages/Login-Admin/index.html">Logout</a>
    </div>
</body>

</html>