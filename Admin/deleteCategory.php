<?php 

/**
 * Array file Doc Comment
 * 
 * PHP version 7.4.33
 * 
 * @category Products_Array
 * @package  Products_Array
 * @author   Author <dindayalpandey1000@domain.com>
 * @license  http://opensourse.org/licesnces/DANY License
 * @link     https://localhost8080
 */
require_once 'config.php';

global $conn;
global $crd;
if (isset($_POST["crids"])) {
    $crd = $_POST["crids"];
    $sql = "DELETE FROM `categories` WHERE `category`='{$crd}'";
    if (mysqli_query($conn, $sql)) {            
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
    $conn->close();
}

?>