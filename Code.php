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

    $allowed_Extention = array('png', 'jpg', 'jpeg');
    $file_Extention = pathinfo($image, PATHINFO_EXTENSION);

    $faileName = time() . "." . $file_Extention;

    $tmpName = $_FILES["imgfile"]["tmp_name"];
    $folder = ("uploads/product/" . $faileName);

    if (!array($file_Extention, $allowed_Extention)) {
        $_SESSION['stutas'] = "You are allowed with only jpg , png , jpeg";
        header("location:index.php");
        exit();
    } else {
        $sql = "INSERT INTO `user data` (`img`,`name`,`email`,`gender`,`language`,`interest`) 
                                 VALUES ('$folder','$name', '$email','$gender','$language','$string')";
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
    
}