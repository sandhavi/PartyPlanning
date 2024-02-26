<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg-Users</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        include("connect.php");
       

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
      

        $sql = "INSERT INTO user " . "(email,username,password) " .
        "VALUES('$email','$username','$password')";

       
        $results = mysqli_query($conn, $sql);

        if (!$results) {
            die('Registration Failed --: ' . mysqli_error($conn));
        } else {
            echo "<script>alert('Successful');window.location.href = '../Pages/Register-Ordinary/index.html';</script>";
            exit();
        }
    } else {

        echo "<script>alert('UnSuccessful');window.location.href = '../Pages/HomePage-Ordinary_User/index.html';</script>";
    }
    ?>

    echo "</table>";

</body>

</html>



<?php








        