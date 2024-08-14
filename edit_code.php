

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'part/_db_connect.php';
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $radio = $_POST['radio1'];
    $language1 = $_POST['language'];

    $lang2 = implode(",", $language1);


    $sql = "UPDATE `user data` SET `name` = '$name', `email`='$email',`gender`='$radio',`language`='$lang2' WHERE `user data`.`id` ='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_start();
        $_SESSION['status'] = "Your data Update success fully";
        header("location:index.php");
        exit();
    } else {
        $_SESSION['status'] = "Your data Update not success fully";
        header("location:index.php");
        exit();
    }
}
?>
