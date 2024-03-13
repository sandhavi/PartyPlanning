

<?php
session_start();

include('../../Include/connectin.php');

// Assuming you have validated and sanitized input
$vendor_id = $_POST['vendor_id'];


$sql = "UPDATE reservation SET  vendor_id=? ORDER BY id DESC LIMIT 1";

$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $vendor_id) ;


if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}


$stmt->close();
$conn->close();

header("Location: ../venue-p/displayBoxes.php");
exit();
?>

