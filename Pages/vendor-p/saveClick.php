<?php
// Include your database connection file
include('../../Include/connectin.php'); 

$vendor_id = $_POST['vendor_id'];

$sql = "UPDATE reservation SET (vendor_id) ORDER BY id DESC LIMIT 1 VALUES (?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo 'Prepare failed: ' . $conn->error;
    exit;
}

$stmt->bind_param("i", $vendor_id);

if (!$stmt->execute()) {
    echo 'Execute failed: ' . $stmt->error;
} else {
    echo 'Success';
}

$stmt->close();
$conn->close();
?>
