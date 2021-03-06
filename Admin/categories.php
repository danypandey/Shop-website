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
                                   <th>Category</th>
                                   <th>Name</th>
                                   <th>Action</th>
                                </tr>
                                
                            </thead>

                            <tbody>                                
                                <?php 

                                if (isset($_POST["edit"])) {
                                    $prod = $_POST["crid"];

                                    $sql1 = "SELECT * FROM `categories` WHERE `category`={$prod}";
                                    $result1 = $conn->query($sql1);
                                    $output = "";
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1 -> fetch_assoc()) {
                                            echo '
                                                <div id="updateform">
                                                <form method="POST" action="">     
                                                
                                                    <p>
                                                    <label>Category</label>
                                                        <input class="text-input small-input" type="text" id="updatecategory" name="updatecategory" value="'.$row1["category"].'" />
                                                        <br />
                                                    </p>

                                                    <p>
                                                    <label>Name</label>
                                                        <input class="text-input small-input" type="text" id="updatename" name="updatename" value="'.$row1["name"].'" />
                                                        <br />
                                                    </p>

                                                    <p>
                                                        <input class="Update" type="button" name="Update" value="Update Category" />
                                                    </p>   
                                                </form>
                                            </div>';
                                        }
                                    }
                                }                                

                                ?>

                                <?php 

                                $sql = "SELECT * FROM categories";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                                                                
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                                            <tr>
                                                <form method="POST" action="">
                                                <td><input type="checkbox" /></td>
                                                <td>'.$row["category"].'</td>
                                                <td>'.$row["name"].'</td>                                               
                                                <td>
                                                    <!-- Icons -->
                                                    <input type="hidden" id="crid" name="crid" value="'.$row["category"].'">
                                                    <button type="submit" class="editbtn" name="edit" style="width:50px "><img src="resources/images/icons/pencil.png" alt="Edit" /></button>
                                                    <button type="submit" data-did="'.$row["category"].'" class="deletebtn" name="delete" style="width:50px "><img src="resources/images/icons/cross.png" alt="Delete" /></button>
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
                                <label>Category</label>
                                    <input class="text-input small-input" type="text" id="category" name="category">
                                    <br />   
                                </p>  

                                <p>
                                <label>Name</label>
                                    <input class="text-input small-input" type="text" id="name" name="name">
                                    <br />
                                </p>                              
                                
                                <p>
                                    <input class="button" type="button" name="submit" id="submit" value="Add Category" />
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
        var category = $('#category').val();    
        var name = $('#name').val();
        
            $.ajax({
                method: "POST",
                url: "addCategory.php",
                dataType:"JSON",
                data: {category : category, name : name}
            }).done(function (msg) {
                alert(msg);
            });
        });

        $('.Update').click(function () {
        var updatecategory = $('#updatecategory').val();
        var updatename = $('#updatename').val();
        $.ajax({
                method: "POST",
                url: "updateCategory.php",
                dataType:"JSON",
                data: {updatecategory : updatecategory, updatename : updatename}
            }).done(function (msg) {
               // header("Location: products.php");
            });

        });

        
        $(".Update").click(function(){
            $("#updateform").hide();
        });
    

        $('.deletebtn').click(function () {
        var crids = $(this).data('did');
        console.log(crid);
        $.ajax({
                method: "POST",
                url: "deleteCategory.php",
                dataType:"JSON",
                data: {crids : crids}
            }).done(function (msg) {
                alert(msg);
               // header("Location: products.php");
            });
        });
    });
    </script>
</body>
</html>