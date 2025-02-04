<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../Include/favicon-icon.svg">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['id'])) {
        include '../../Include/connectin.php';
        $userId = $_SESSION['id'];
        $sql = "SELECT name FROM customer WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          
            $row = $result->fetch_assoc();
            $userName = $row['name'];
        } else {
           
            $userName = "Log In";
        }
        
    } else {
        $userName = "Log In";
    }


    if (isset($_SESSION['id'])) {

        $userId = $_SESSION['id'];
        $sql = "SELECT name, username, age, email, address, password  FROM customer WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $userName = $row['username'];
            $age = $row['age'];
            $email = $row['email'];
            $address = $row['address'];
            $password = $row['password'];
        } else {
          
            $userName = "Log In";
        }
      
    } else {
        $userName = "Log In";
    }
    ?>

    <div id="profile-form">
        <h1>Welcome, <?php echo $name; ?></h1>
        <form id="update-form" method="POST" action="../../Backend/updateProfile.php">

            <lable for="name">Name</lable>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">

            <label for="username">User Name</label>
            <input type="text" id="username" name="username" value="<?php echo $userName; ?>">

            <label for="age">Age</label>
            <input type="text" id="age" name="age" value="<?php echo $age; ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>">


            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">

                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div><input type="submit" value="Update"></div>

    </div>

    </form>
    <?php
    include '../../Backend/viewUserRes.php'
    ?>
    </div>
    <?php
        include '../../Backend/back.php'
        ?>
    <script src="script.js"></script>
</body>

</html>