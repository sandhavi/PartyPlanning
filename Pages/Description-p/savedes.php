<?php
session_start();

include('../../Include/connectin.php');

// Assuming you have validated and sanitized input
$description = $_POST['description'];


$sql = "UPDATE reservation SET description=? ORDER BY id DESC LIMIT 1";

$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $description);


if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}


$stmt->close();
$conn->close();

header("Location: ../checkout/formD.php");
exit();
?>
