<?php

$server = "localhost";
$username = "root";
$password = "root";
$db = "my_first_database";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	die("Connection Faild: " .mysqli_connect_error());
}



?>