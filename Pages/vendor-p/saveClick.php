<?php
include('../../Include/connectin.php');


session_start();

if (isset($_SESSION['id'])) {
    include '../../Include/connectin.php';
    $userId = $_SESSION['id'];
    $sql = "SELECT name FROM customer WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, get the name
        $row = $result->fetch_assoc();
        $userName = $row['name'];
    } else {
        $userName = "Log In";
    }
    $conn->close();
} else {
    $userName = "Log In";
}


$vendor_id = $_POST['vendor_id'];


$sql = "UPDATE reservation SET vendor_id=? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssi", $vendor_id);


if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}


$stmt->close();
$conn->close();

header("Location: ../venue-p/displayBoxes.php");
exit();
?>

