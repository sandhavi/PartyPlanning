<?php
include '../Include/connectin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $userName = $_POST['username'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    session_start();
    $user_id = $_SESSION['id'];

    $query = "UPDATE `customer` SET `name`=?, `username`=?, `age`=?, `email`=?, `address`=?, `password`=? WHERE `id`=?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssisssi", $name, $userName, $age, $email, $address, $password, $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = ['success' => true, 'message' => 'Profile updated successfully.'];
        } else {
            $response = ['success' => false, 'message' => 'No changes made to the profile.'];
        }

        $stmt->close();
    } else {
        $response = ['success' => false, 'message' => 'Unable to update profile.'];
    }

    $conn->close();

    echo json_encode($response);
} else {
    $response = ['success' => false, 'message' => 'Invalid request.'];
    echo json_encode($response);
}
