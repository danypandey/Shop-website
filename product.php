<?php require_once 'header.php'; ?>
<?php require_once 'config.php'; ?>

  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Women</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
                <ul class="aa-product-catg">

                <?php 
                    $result_per_page =5;
                    global $categoryid;
                    global $tagid;
                    global $sq;
                    global $sql;

                if (isset($_GET["categoryId"])) {
                    $categoryid = $_GET["categoryId"];
                    if ($categoryid == "1010") {
                        $sq="SELECT * FROM products";
                        $res = $conn->query($sq);
                        $number_of_results =mysqli_num_rows($res);
                        $number_of_pages =ceil($number_of_results / $result_per_page);
                        //$page=$_GET['page'];
                        if (isset($_GET['page'])) {
                            $page=$_GET['page'];;
                        } else {
                            $page=1;
                        } 
                        $this_page_first_result = ($page-1) * $result_per_page;
                        $sql="SELECT * FROM `products` LIMIT {$this_page_first_result}, {$result_per_page}";
                    } else {
                        $sq="SELECT * FROM products WHERE `category`='{$categoryid}'";
                        $res = $conn->query($sq);
                        $number_of_results =mysqli_num_rows($res);
                        $number_of_pages =ceil($number_of_results / $result_per_page);
                        //$page=$_GET['page'];
                        if (isset($_GET['page'])) {
                            $page=$_GET['page'];;
                        } else {
                            $page=1;
                        } 
                        $this_page_first_result = ($page-1) * $result_per_page;
                        $sql="SELECT * FROM `products` WHERE `category`='{$categoryid}' LIMIT {$this_page_first_result}, {$result_per_page}";
                    }                    
                    
                    
                } elseif (isset($_GET["tagId"])) {
                    $tagid = $_GET["tagId"];
                    $sq="SELECT * FROM products WHERE `tags`='{$tagid}'";
                    $res = $conn->query($sq);
                    $number_of_results =mysqli_num_rows($res);
                    $number_of_pages =ceil($number_of_results / $result_per_page);
                    //$page=$_GET['page'];
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];;
                    } else {
                        $page=1;
                    } 
                    $this_page_first_result = ($page-1) * $result_per_page;
                    $sql="SELECT * FROM `products` WHERE `tags`='{$tagid}' LIMIT {$this_page_first_result}, {$result_per_page}";
                } else {
                    $sq="SELECT * FROM products";
                    $res = $conn->query($sq);
                    $number_of_results =mysqli_num_rows($res);
                    $number_of_pages =ceil($number_of_results / $result_per_page);
                    //$page=$_GET['page'];
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];;
                    } else {
                        $page=1;
                    } 
                    $this_page_first_result = ($page-1) * $result_per_page;
                    $sql="SELECT * FROM `products` LIMIT {$this_page_first_result}, {$result_per_page}";
                }             
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                                                
                    while ($row = $result->fetch_assoc()) {
                        ?>

                    <li>
                    <figure>
                        <a class="aa-product-img" href="#"><img src="<?php echo $row["image"] ?>" style="width:300px; height:300px" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="cart.php?productId=<?php echo $row["product_id"] ?>" ><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                        <h4 class="aa-product-title"><a href="#"><?php echo $row["name"] ?></a></h4>
                        <span class="aa-product-price">$<?php echo $row["price"] ?></span><span class="aa-product-price"><del><?php echo $row["price"] ?></del></span>
                        <p class="aa-product-descrip"><?php echo $row["description"] ?></p>
                        </figcaption>
                    </figure>                          
                    <div class="aa-product-hvr-content">
                        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                        <a href="" class="once" data-did="<?php echo $row["product_id"]; ?>" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a> 
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-hot" href="#">HOT!</span>
                    </li>
                            <?php 

                    }
                }
                    
                ?>
                </ul> 
                <script>
                    $(document).ready(function () {
                        $('.once').click(function () {
                            var prd_id = $(this).data('did');
                            //alert(prd_id);
                            $.ajax({
                                method: "POST",
                                url: "productView.php",
                                data: {prd_id : prd_id},
                                success : function(data) {
                                    $("#display").html(data);
                                }
                            });
                        });
                    });
                </script>                
            </div>
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">                      
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div id="display"></div>
            </div>                        
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php
                    for ($i=1; $i<=$number_of_pages; $i++) {
                        if ($i==$page) {
                            $active='active';
                        } else {
                            $active ='';
                        }
                        ?>
                          <li <?php echo $active ?>><a href="product.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php 
                    }
                    ?>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <?php 
                $sql2="SELECT * FROM categories";
                $result2=mysqli_query($conn, $sql2) or die("Query Unsuccessful.");

                while ($row2=mysqli_fetch_assoc($result2)) {
                    ?>
                    <li><a href="?categoryId=<?php echo $row2["category"] ?>"><?php echo $row2['name'] ?></a></li> 
                <?php } ?>
                <li><a href="?categoryId=<?php echo "1010" ?>"><?php echo "All Products" ?></a></li>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <?php 
                $sql2="SELECT * FROM tags";
                $result2=mysqli_query($conn, $sql2) or die("Query Unsuccessful.");

                while ($row2=mysqli_fetch_assoc($result2)) {
                    ?>
                    <a href="?tagId=<?php echo $row2["name"] ?>"><?php echo $row2['name'] ?></a>
                <?php } ?>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


  <?php require_once 'footer.php' ?>