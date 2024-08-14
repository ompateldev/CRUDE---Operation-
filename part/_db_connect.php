
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ar_tech";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("connection was fail".mysqli_connect_error());
}


?>