<?php
session_start();



// Include database connection
include('../../Include/connectin.php');

// Assuming you have validated and sanitized input
$date = $_POST['date'];
$time = $_POST['time'];
$no_guests = $_POST['no_guests'];

// Prepare the update statement to update the last row
// This example assumes 'id' is an auto-increment column used to identify the last row
$sql = "UPDATE reservation SET date=?, time=?, no_guests=? ORDER BY id DESC LIMIT 1";

$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssi", $date, $time, $no_guests);


if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}


$stmt->close();
$conn->close();
?>
