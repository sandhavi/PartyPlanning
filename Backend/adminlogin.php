<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '../Include/connectin.php';


    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT id, username, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      
        $stmt->bind_result($admin_id, $db_username, $db_password);
        $stmt->fetch();

        if ($password == $db_password) {
         
            session_start();
            $_SESSION['id'] = $admin_id;
            $_SESSION['username'] = $db_username;
            
            echo "<script>alert('Login successful'); 
            window.location.href = './admindashboard.php';</script>";
            exit();
        } else {
            
            echo "<script>alert('Incorrect password'); 
            window.location.href = '../Pages/Login-Admin/index.html;</script>";
            exit();
        }
    } else {
        
        echo "<script>alert('User not found'); 
        window.location.href = '../Pages/Login-Admin/index.html;</script>";
        exit();
    }

    
    $stmt->close();
    $conn->close();
}
?>
