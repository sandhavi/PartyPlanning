<?php
// Include your database connection file
include('../../Include/connectin.php'); 

$theme_id = $_POST['theme_id'];

$sql = "INSERT INTO reservation (theme_id) VALUES (?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo 'Prepare failed: ' . $conn->error;
    exit;
}

$stmt->bind_param("i", $theme_id);

if (!$stmt->execute()) {
    echo 'Execute failed: ' . $stmt->error;
} else {
    echo 'Success';
}

$stmt->close();
$conn->close();
?>
