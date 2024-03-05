<?php
include('../../Include/connection.php'); // Ensure the path is correct

$key = $_POST['key'];

$sql = "INSERT INTO reservation (theme_id) VALUES (?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo 'failure'; // Preparation failed
    exit;
}

$stmt->bind_param("i", $key);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'failure';
}

$stmt->close();
$conn->close();
?>
