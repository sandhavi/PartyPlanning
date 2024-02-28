<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include '../Include/connectin.php';

    // Get user input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $stmt = $conn->prepare("SELECT id, username, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, verify password
        $stmt->bind_result($admin_id, $db_username, $db_password);
        $stmt->fetch();

        if ($password == $db_password) {
            // Password is correct, user is authenticated
            session_start();
            $_SESSION['id'] = $admin_id;
            $_SESSION['username'] = $db_username;
            // Redirect to a dashboard or another page
            echo "<script>alert('Login successful'); 
            window.location.href = './admindashboard.php';</script>";
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Incorrect password'); 
            window.location.href = './admindashboard.php;</script>";
            exit();
        }
    } else {
        // User not found
        echo "<script>alert('User not found'); 
        window.location.href = '../Pages/Login-Admin/index.html;</script>";
        exit();
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
