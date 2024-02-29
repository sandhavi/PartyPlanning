<?php
include './Include/connectin.php'; // Database connection

$data = json_decode(file_get_contents('php://input'), true);

$userId = 1; // Example user ID, replace with actual session or authentication mechanism

$sql = "UPDATE customer SET name=:name, age=:age, email=:email, address=address WHERE id=:userId";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
    'name' => $data['name'],
    'age' => $data['age'],
    'email' => $data['email'],
    'address' => $data['address'],
    'userId' => $userId
]);

if ($result) {
    echo 'Success';
} else {
    echo 'Error';
}
?>
