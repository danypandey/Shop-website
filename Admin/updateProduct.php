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
global $prod;
if (isset($_POST["updateid"])) {
    $prod = $_POST;

    $sql = "UPDATE `products` SET `name`='{$prod["updatename"]}',`image`='{$prod["updateimage"]}', `price`='{$prod["updateprice"]}', `description`='{$prod["updatemessage"]}' WHERE `product_id`='{$prod["updateid"]}'";
    if (mysqli_query($conn, $sql)) {            
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
    $conn->close();
}   

?>