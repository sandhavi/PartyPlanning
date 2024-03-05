<?php
// Include your database connection file
include('../../Include/connectin.php'); 

$venue_id = $_POST['venue_id'];

$sql = "INSERT INTO reservation (venue_id) VALUES (?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo 'Prepare failed: ' . $conn->error;
    exit;
}

$stmt->bind_param("i", $venue_id);

if (!$stmt->execute()) {
    echo 'Execute failed: ' . $stmt->error;
} else {
    echo 'Success';
}

$stmt->close();
$conn->close();
?>
