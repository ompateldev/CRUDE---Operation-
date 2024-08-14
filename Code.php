<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'part/_db_connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['radio1'];
    $lang = $_POST['language'];
    $language = implode(",", $lang);


    $sql = "INSERT INTO `user data` (`name`,`email`,`gender`,`language`) VALUES ('$name', '$email','$gender','$language')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_start();
        $_SESSION['status'] = "Your data insert success fully";
        header("location:index.php");
        exit();
    } else {
        $_SESSION['status'] = "Your data insert not success fully";
        header("location:index.php");
        exit();
    }
}
