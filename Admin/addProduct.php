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

global $product;
global $conn;

if (isset($_POST)) {
    $product =  $_POST;
    if (isset($product) && !empty($product)) {
        $sql = "INSERT INTO `products`(`name`, `image`, `price`, `category`, `tags`, `description`) VALUES ( '{$product["name"]}',
            '{$product["filename"]}', '{$product["price"]}', '{$product["dropdown"]}','{$product["tags"]}', '{$product["message"]}')";

        /* $sql = "INSERT INTO `products`(`name`, `image`, `price`, `category`, `tags`, `description`) VALUES ( '{$product["name"]}',
            '{$product["filename"]}', '{$product["price"]}', (SELECT `category` FROM `categories` 
            WHERE `category`= '{$product["dropdown"]}'),'{$product["tags"]}', '{$product["message"]}')"; */

        $result = $conn->query($sql);
        
        $conn->close();
    }
}

?>