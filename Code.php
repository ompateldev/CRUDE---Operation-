<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'part/_db_connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['radio1'];
    $lang = $_POST['language'];
    $language = implode(",", $lang);
    $interst = $_POST['interest'];
    $string = implode(",", $interst);

    $image = $_FILES["imgfile"]["name"];

    $faileName = time() . "." . $image;

    $tmpName = $_FILES["imgfile"]["tmp_name"];

    $folder = ("uploads/product/" . $faileName);


    $sql = "INSERT INTO `user data` (`img`,`name`,`email`,`gender`,`language`,`interest`) VALUES ('$folder','$name', '$email','$gender','$language','$string')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_start();
        move_uploaded_file($tmpName, $folder);
        $_SESSION['status'] = "Your data insert success fully";
        header("location:index.php");
        exit();
    } else {
        $_SESSION['status'] = "Your data insert not success fully";
        header("location:index.php");
        exit();
    }
}
