<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'part/_db_connect.php';

    $id = $_POST['user_id'];

    $sql = "DELETE FROM `user data` WHERE `user data`.`id` ='$id'";

    $result=mysqli_query($conn,$sql);

    
    if ($result) {
        session_start();
        $_SESSION['deleted'] = "Your data Deleted  success fully";
        header("location:index.php");
        exit();
    } else {
        $_SESSION['deleted'] = "Your data Deleted not success fully";
        header("location:index.php");
        exit();
    }
}
