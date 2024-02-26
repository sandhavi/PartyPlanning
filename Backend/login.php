<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include '../Include/connectin.php';

    // Get user input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, verify password
        $stmt->bind_result($user_id, $db_username, $db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            // Password is correct, user is authenticated
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $db_username;

            // Redirect to a dashboard or another page
            header("Location: ../../../Pages/HomePage-Ordinary_User/index.html");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
