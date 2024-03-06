<?php
include('../../Include/connectin.php');

$venue_id = $_POST['venue_id'];
$reservation_id = $_POST['id']; // Assuming this is passed similarly

$sql = "UPDATE reservation SET venue_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo 'Prepare failed: ' . $conn->error;
    exit;
}

$stmt->bind_param("ii", $venue_id, $reservation_id);

if (!$stmt->execute()) {
    echo 'Execute failed: ' . $stmt->error;
} else {
    echo 'Success';
}

$stmt->close();
$conn->close();
?>
