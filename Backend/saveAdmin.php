<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../Include/connectin.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO customer (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $password);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo "<script>alert('Login successful'); 
            window.location.href = '../Pages/Login/LoginUser.html';</script>";
    exit();
}
