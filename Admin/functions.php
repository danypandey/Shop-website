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
if (isset($_POST)) {
    $product =  $_POST;
    addProduct();
}

/**
 * Getting product
 * 
 * @return array
 */
function updateProduct() 
{
    global $conn;
    $sql = "UPDATE `products` SET `product_id`=[value-1],`name`=[value-2],`image`=[value-3],`price`=[value-4],`category`=[value-5],`tags`=[value-6],`description`=[value-7] WHERE 1";
}

/**
 * Getting product
 * 
 * @return void
 */
function addProduct()
{
    global $product;
    global $conn;
    if (isset($product) && !empty($product)) {
        $sql = "INSERT INTO `products`(`name`, `image`, `price`, `category`, `tags`, `description`) VALUES ( '{$product["name"]}',
            '{$product["filename"]}', '{$product["price"]}', '{$product["dropdown"]}','{$product["tags"]}', '{$product["message"]}')";
        $result = $conn->query($sql);
        
        $conn->close();

        /* $sql = "INSERT INTO `categories`(`category`, `name`) VALUES (SELECT `category` FROM `products` WHERE `category`='{$product["category"]}', SELECT `name` FROM `products` WHERE `name`='{$product["name"]}')";
        $result = $conn->query($sql);
        $conn->close(); */
    }
}

/**
 * Deleting selected products
 * 
 * @return void
 */
function deleteProduct($pr_id)
{
    $sql = "DELETE FROM `products` WHERE `product_id`='{.$pr_id.}'";
    $result = $conn->query($sql);
    $conn->close();
}

/**
 * Displaying selected products
 * 
 * @return void
 */
function displayProducts()
{

    /* if (isset($_POST['edit'])) {
        
        updateProduct();
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['pid'];
        deleteProduct($id);
    }*/

    global $conn;
    $sql = "SELECT `product_id`, `name`, `image`, `price`, `description`  FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
                                    
        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>'.$row["product_id"].'</td>
                    <td>'.$row["name"].'</td>
                    <td><img src='.$row["image"].' style="width:30px; height:30px"></td>
                    <td>'.$row["price"].'</td>
                    <td>'.$row["description"].'</td>
                    <form acton="" method="get">
                    <td>
                        <!-- Icons -->
                        <input type="hidden" name="pid"
                            value='.$row["product_id"].'><br>
                        <button type="submit" class="edit" name="edit" style="width:50px "><img src="resources/images/icons/pencil.png" alt="Edit" /></button>
                        <button type="submit" class="delete" name="delete" style="width:50px "><img src="resources/images/icons/cross.png" alt="Delete" /></button>
                    </td>
                    </form>
                </tr>
            ';
        }
    }
    $conn->close();
}

?>