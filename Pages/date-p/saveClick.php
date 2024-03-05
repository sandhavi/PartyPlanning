<?php
// Include your database connection file
include('../../Include/connectin.php'); 

$vendor_id = $_POST['vendor_id'];

$sql = "INSERT INTO reservation (vendor_id) VALUES (?)";
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
