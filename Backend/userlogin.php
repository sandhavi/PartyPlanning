<?php
session_start();
$message = "";
if (isset($_POST['submit'])) {

   include '../Include/connectin.php';

  
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//    $username = $_POST["username"];


//    $sql = "SELECT * FROM user WHERE email='$email' and password ='$password'";
   
//    $result = mysqli_query($conn, $sql);

//    $row = mysqli_fetch_array($result);

//    $_SESSION['name'] = $row['user'];

//    if (mysqli_num_rows($result) == 1) {


//       echo "<script>alert('Successful');window.location.href = 'https://www.youtube.com/';</script>";
//       exit();
//    } 
//    else {
//       echo "<script>alert('Error');window.location.href = 'https://www.google.com/';</script>";
//    }
  

$validEmail = 'user@gamil.com';
$validPassword = '123';

$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

if ($userEmail === $validEmail && $userPassword === $validPassword) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
}


}
