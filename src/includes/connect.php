<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "hospital";

if (!$conn = mysqli_connect($server, $username, $password, $db)) {

    die("Error: connection error! ");
}
?>