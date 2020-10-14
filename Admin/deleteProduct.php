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
global $prd;
if (isset($_POST)) {
    $prd = $_POST;
    print_r($prd);
    $sql = "DELETE FROM `products` WHERE `product_id`='{$prd["id"]}'";
    $result = $conn->query($sql);
    $conn->close();
}

?>