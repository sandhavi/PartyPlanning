<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>connect-php</title>
</head>

<body>
    <?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    // if (!$conn) {
    //     die('Could not connect: ' . mysqli_connect_error());
    // }
    // echo 'connected successfully';

    // echo "<hr>";
    $db = mysqli_select_db($conn, 'party');

    if (!$db) {
        echo 'Error Check Name of the Database';
    } else {
        echo 'Database Sucessfully Connected';
    }
    ?>
</body>

</html>