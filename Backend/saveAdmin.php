<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../Include/connectin.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO admin (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $username, $password);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo "<script>alert('Admin Registration successful'); 
            window.location.href = './adminlogin.php';</script>";
    exit();
}
