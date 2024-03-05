<?php
// savePrimaryKey.php
include('../../Include/connectin.php'); // Check the path for correctness

$data = json_decode(file_get_contents('php://input'), true);
$key = $data['key'];

// Assuming your table to store primary keys is named 'clicked_items'
// and has at least two columns: id (auto_increment primary key) and theme_id (to store the clicked item's primary key)
$sql = "INSERT INTO clicked_items (theme_id) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $key); // Assuming the primary key is an integer

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
