<?php

require "../Include/connectin.php";

$email = $_POST["email"];
$username= $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];


if (empty($email)) {
    echo ("Please enter your Email !!!");
} else if (strlen($email) >= 50) {
    echo ("Email must have less than 100 characters");
}  else if (empty($username)) {
    echo ("Username must have less than 3 characters");
} else if (empty($password)) {
    echo ("Please enter your Password !!!");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must be between 5 - 20 characters");
} else if ($confirmPassword !== $password) {
    echo ("Please Enter Correct Password");
} else {

    require "../Include/connectin.php";
    $rs = $db::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the same Email already exists.");
    } else {

        $db::iud("INSERT INTO `user` (`email`,`username`,`password`)
        VALUES ('" . $email . "','" . $username . "','" . $password . "')");

        echo "success";
    }
}
