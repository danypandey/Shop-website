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
$array =$_POST["tags"];
//$arr[]=implode(" ", $array);
$arr=(serialize($array));
if (isset($_POST)) {
    $product =  $_POST;
    if (isset($product) && !empty($product)) {
        $sql = "INSERT INTO `products`(`name`, `image`, `price`, `category`, `tags`, `description`) VALUES ( '{$product["name"]}',
            '{$product["filename"]}', '{$product["price"]}', (SELECT `category` FROM categories WHERE `name` = '{$product["dropdown"]}'), '{$arr}', '{$product["message"]}')";
        if (mysqli_query($conn, $sql)) {            
            echo 1;
        } else {
            echo "Error : " .$sql. "<br>" .$conn -> error;
        }
        $conn->close();
    }
}

?>