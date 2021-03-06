<?php require_once 'header.php'; ?>
<?php require_once 'sidebar.php'; ?>
<?php require_once 'config.php'; ?>
<?php 

global $image;
if (isset($_FILES["imageUpload"]["name"])) {
    $filename = $_FILES["imageUpload"]["name"];
    $target_dir="upload/".$filename;
    //$target_file=$target_dir.basename($_FILES["imageUpload"]["name"]);
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_dir)) {
        $image = $_FILES["imageUpload"]["name"];
    }
}
?>

        <div id="main-content"> <!-- Main Content Section with everything -->
            
            <noscript> <!-- Show a notification if the user has disabled javascript -->
                <div class="notification error png_bg">
                    <div>
                        Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                    </div>
                </div>
            </noscript>
            
            <div class="clear"></div> <!-- End .clear -->
            
            <div class="content-box"><!-- Start Content Box -->
                
                <div class="content-box-header">
                    
                    <h3>Content box</h3>
                    
                    <ul class="content-box-tabs">
                        <li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
                        <li><a href="#tab2">Add</a></li>
                    </ul>
                    
                    <div class="clear"></div>
                    
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                    
                    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                        
                        <!-- <div class="notification attention png_bg">
                            <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                            <div>
                                This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
                            </div>
                        </div> -->
                        <table>    
                            <thead>
                                <tr>
                                   <th><input class="check-all" type="checkbox" /></th>
                                   <th>Product Id</th>
                                   <th>Product Name</th>
                                   <th>Product Image</th>
                                   <th>Product Price</th>
                                   <th>Product Description</th>
                                   <th>Action</th>
                                </tr>
                                
                            </thead>
                         
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="bulk-actions align-left">
                                            <select name="dropdown">
                                                <option value="option1">Choose an action...</option>
                                                <option value="option2">Edit</option>
                                                <option value="option3">Delete</option>
                                            </select>
                                            <a class="button" href="#">Apply to selected</a>
                                        </div>
                                        
                                        <div class="pagination">
                                            <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                                            <a href="#" class="number" title="1">1</a>
                                            <a href="#" class="number" title="2">2</a>
                                            <a href="#" class="number current" title="3">3</a>
                                            <a href="#" class="number" title="4">4</a>
                                            <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                                        </div> <!-- End .pagination -->
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tfoot>

                            <tbody>                                
                                <?php 

                                if (isset($_POST["edit"])) {
                                    $prod = $_POST["prid"];

                                    $sql1 = "SELECT * FROM `products` WHERE `product_id`={$prod}";
                                    $result1 = $conn->query($sql1);
                                    $output = "";
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1 -> fetch_assoc()) {
                                            echo '
                                                <div id="updateform">
                                                <form method="POST" action="">                                                    
                                                    <input class="text-input small-input" type="hidden" id="updateid" name="updateid" value="'.$row1["product_id"].'" />
                                                    <br />
                                                
                                                    <p>
                                                    <label>Name</label>
                                                        <input class="text-input small-input" type="text" id="updatename" name="updatename" value="'.$row1["name"].'" />
                                                        <br />
                                                    </p>

                                                    <p>
                                                        <label>Image</label>
                                                            <input class="text-input small-input" type="text" id="updateimage" name="updateimage" value="'.$row1["image"].'"/>
                                                            <br />
                                                    </p>
                                                    
                                                    <p>
                                                        <label>Price</label>
                                                            <input class="text-input small-input" type="text" id="updateprice" name="updateprice" value="'.$row1["price"].'"/>
                                                            <br />
                                                    </p>

                                                    <p>
                                                    <label>Description</label>
                                                        <textarea class="text-input textarea wysiwyg" id="updatetextarea" name="updatetextarea" cols="20" rows="5" text="'.$row1["description"].'"></textarea>
                                                    </p>
                                                    
                                                    <p>
                                                        <input class="Update" type="button" name="Update" value="Update Product" />
                                                    </p>   
                                                </form>
                                            </div>';
                                        }
                                    }
                                }                                

                                ?>

                                <?php 

                                $sql = "SELECT `product_id`, `name`, `image`, `price`, `description`  FROM products";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                                                                
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                                            <tr>
                                                <form method="POST" action="">
                                                <td><input type="checkbox" /></td>
                                                <td>'.$row["product_id"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td><img src='.$row["image"].' style="width:30px; height:30px"></td>
                                                <td>'.$row["price"].'</td>
                                                <td>'.$row["description"].'</td>                                                
                                                <td>
                                                    <!-- Icons -->
                                                    <input type="hidden" id="prid" name="prid" value="'.$row["product_id"].'">
                                                    <button type="submit" class="editbtn" name="edit" style="width:50px "><img src="resources/images/icons/pencil.png" alt="Edit" /></button>
                                                    <button type="submit" class="deletebtn" data-did="'.$row["product_id"].'" name="delete" style="width:50px "><img src="resources/images/icons/cross.png" alt="Delete" /></button>
                                                </td>
                                                </form>
                                            </tr>
                                        ';
                                    }
                                }
                                
                                ?>  
                                                                   
                            </tbody>                            
                    </table>
                        
                    </div> <!-- End #tab1 -->
                    
                    <div class="tab-content" id="tab2">
                    
                        <form action="" method="post" class="myForm" enctype="multipart/form-data">
                            
                            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                
                                <p>
                                    <label>Name</label>
                                        <input class="text-input small-input" type="text" id="name" name="name" />
                                        <br />
                                </p>
                                
                                <p>
                                    <label>Price</label>
                                        <input class="text-input small-input" type="text" id="price" name="price" />
                                        <br />
                                </p>

                                <p>
                                    <label>Image</label>
                                        <input class="text-input small-input" type="text" id="imageUpload" name="imageUpload" />
                                        <br />
                                </p>

                                <p>
                                    <select id="dropdown" name="dropdown" class="small-input">
                                        <option value="">Select Category</option>
                                            <?php
                                            $sql2 = "SELECT * FROM `categories`";
                                            $result2 = $conn->query($sql2);
                                            while ($row2 = $result2 -> fetch_assoc()) { 
                                                ?>
                                            <option value="<?php echo $row2['name'];?>">
                                                <?php echo $row2['name']?></option>
                                            <?php }?>
                                    </select>
                                </p>
                                
                                <p>
                                    <label>Tags</label>
                                    <input type="checkbox" value="Fashion" name="tags" />Fashion
                                    <input type="checkbox" value="Ecommerece" name="tags" />Ecommerece
                                    <input type="checkbox" value="Shop" name="tags" />Shop
                                    <input type="checkbox" value="Handbag" name="tags" />Handbag
                                    <input type="checkbox" value="Laptop" name="tags" />Laptop
                                    <input type="checkbox" value="Headphone" name="tags" />Headphone
                                </p>
                                                                                                
                                <p>
                                    <label>Description</label>
                                    <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="50" rows="10"></textarea>
                                </p>
                                
                                <p>
                                    <input class="button" type="button" name="submit" id="submit" value="Add Product" />
                                </p>
                                
                            </fieldset>
                            
                            <div class="clear"></div><!-- End .clear -->    
                        </form>
                        
                    </div> <!-- End #tab2 -->        
                    
                </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            
            
            <div class="clear"></div>        
            
            <!-- Start Notifications -->
            
            <!-- <div class="notification attention png_bg">
                <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
                </div>
            </div>
            
            <div class="notification information png_bg">
                <a href="#" ="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                  class  Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
                </div>
            </div>
            
            <div class="notification success png_bg">
                <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
                </div>
            </div>
            
            <div class="notification error png_bg">
                <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
                </div>
            </div> -->
            
            <!-- End Notifications -->
        
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
	<meta name="keywords" content="HTML,CSS">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <script>
    $(document).ready(function(){
        $('#submit').click(function () {
        var name = $('#name').val();
        var price = $('#price').val();
        var filename = $("#imageUpload").val();
        var tags = [];
        $.each($("input[name='tags']:checked"), function() {
            tags.push($(this).val());
        });
        var dropdown=$("#dropdown").val();
        var message = $('#textarea').val();
            $.ajax({
                method: "POST",
                url: "addProduct.php",
                data: {name : name, price: price, filename : filename, tags : tags, dropdown : dropdown, message : message},
                success : function(data){
                if(data == 1){
                alert("Successfully Added");  
                } else {
                alert("failed");
                }
            }
            });
        });

        $('.Update').click(function () {
        var updateid = $('#updateid').val();
        var updatename = $('#updatename').val();
        var updateprice = $('#updateprice').val();
        var updateimage = $("#updateimage").val();
        /*var updatedropdown = $('#updatedropdown option:selected').text();
         var updatetags = [];
        $.each($("input[name='updatetags']:checked"), function(){
            updatetags.push($(this).val());
        });*/
        var updatemessage = $('#updatetextarea').val();
        $.ajax({
                method: "POST",
                url: "updateProduct.php",
                data: {updateid : updateid, updatename : updatename, updateprice : updateprice, updateimage : updateimage, updatemessage : updatemessage},
                success : function(data){
                if(data == 1){
                alert("Successfully Updated");  
                } else {
                alert("failed");
                }
            }
            })
        });

        
        $(".Update").click(function(){
            $("#updateform").hide();
        });
    

        $('.deletebtn').click(function () {
        var id = $(this).data('did');
        $.ajax({
                method: "POST",
                url: "deleteProduct.php",
                data: {id : id},
                success : function(data){
                if(data == 1){
                alert("Successfully Deleted");  
                } else {
                alert("failed");
                }
            }
            })
        });
    });
    </script>
</body>
</html>