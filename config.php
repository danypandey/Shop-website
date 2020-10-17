<?php 

$db_host = "localhost";
$db_user = "dindayalpandey";
$db_password = "Dany@100";
$db_name = "dindayalpandey";
global $conn;
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>