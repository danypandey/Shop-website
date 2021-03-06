<?php require_once 'config.php'; ?>

<?php 

if (isset($_POST["prd_id"])) {

    $prdid = $_POST["prd_id"];
    $sql1 = "SELECT * FROM `products` WHERE `product_id`='{$prdid}'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
                                    
        while ($row1 = $result1->fetch_assoc()) {
            ?> 

        <!-- quick view modal -->
        
                <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-6 col-sm-6 col-xs-12">                              
                    <div class="aa-product-view-slider">                                
                    <div class="simpleLens-gallery-container" id="demo-1">
                        <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="<?php echo $row1["image"] ?>">
                                    <img src="<?php echo $row1["image"] ?>" class="simpleLens-big-image" style="width:350px; height:350px">
                                </a>
                            </div>
                            </div>
                            <!-- <div class="simpleLens-thumbnails-container">
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="resources/images/icons/w1.jpeg"
                                    data-big-image="resources/images/icons/w1.jpeg">
                                    <img src="resources/images/icons/w1.jpeg">
                                </a>                                    
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="resources/images/icons/w1.jpeg"
                                    data-big-image="resources/images/icons/w1.jpeg">
                                    <img src="resources/images/icons/w1.jpeg">
                                </a>

                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="resources/images/icons/w1.jpeg"
                                    data-big-image="resources/images/icons/w1.jpeg">
                                    <img src="resources/images/icons/w1.jpeg">
                                </a>
                            </div> -->
                    </div>
                    </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="aa-product-view-content">
                    <h3><?php echo $row1["name"] ?></h3>
                    <div class="aa-price-block">
                        <span class="aa-product-view-price">$<?php echo $row1["price"] ?></span>
                        <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p><?php echo $row1["description"] ?></p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                        <a href="#">S</a>
                        <a href="#">M</a>
                        <a href="#">L</a>
                        <a href="#">XL</a>
                    </div>
                    <div class="aa-prod-quantity">
                        <form action="">
                        <select name="" id="">
                            <option value="0" selected="1">1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                            <option value="4">5</option>
                            <option value="5">6</option>
                        </select>
                        </form>
                        <p class="aa-prod-category">
                        Category: <a href="#"><?php echo $row1["category"] ?></a>
                        </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                        <a href="cart.php?productId=<?php echo $row1["product_id"] ?>" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <a href="product-detail.php?productId=<?php echo $row1["product_id"] ?>" class="aa-add-to-cart-btn">View Details</a>
                    </div>
                    </div>
                </div>
                </div>
           
        <!-- / quick view modal -->

            <?php 

        }
    } 
}
?>