<?php 

/**
 * Array file Doc Comment
 * 
 * PHP version 7.4.33
 * 
 * @category cateucts_Array
 * @package  cateucts_Array
 * @author   Author <dindayalpandey1000@domain.com>
 * @license  http://opensourse.org/licesnces/DANY License
 * @link     https://localhost8080
 */
require_once 'config.php';

global $conn;
global $cate;
if (isset($_POST["updatecategory"])) {
    $cate = $_POST;

    $sql = "UPDATE `categories` SET `category`='{$cate["updatecategory"]}', `name`='{$cate["updatename"]}' WHERE `category`='{$cate["updatecategory"]}'";
    if (mysqli_query($conn, $sql)) {            
        echo 1;
    } else {
        echo "Error : " .$sql. "<br>" .$conn -> error;
    }
    $conn->close();

    
}   

?>