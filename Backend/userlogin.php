<?php
session_start();
$message = "";
if (isset($_POST['submit'])) {

    include 'connect.php';


    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];


    $sql = "SELECT * FROM user WHERE email='$email' and password ='$password'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $_SESSION['fname'] = $row['user'];

    if (mysqli_num_rows($result) == 1) {


        echo "<script>alert('Successful');window.location.href = '../Pages/Home/index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Error');window.location.href = '../Pages/Login/index.html';</script>";
    }
}
