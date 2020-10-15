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

global $category;
global $conn;

if (isset($_POST["category"])) {
    $category =  $_POST;
    if (isset($category) && !empty($category)) {
        $sql = "INSERT INTO `categories`(`category`, `name`) VALUES ('{$category["category"]}', '{$category["name"]}')";

        $result = $conn->query($sql);
        
        $conn->close();
    }
}

?>