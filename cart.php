<?php session_start(); ?>
<?php require_once 'header.php' ?>
<?php require_once 'config.php' ?>

  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (empty($_SESSION['cart'])) {       
                        global $cart ;
                        $cart = array();
                    } else {
                        $cart = $_SESSION['cart'];
                    }

                    if (isset($_GET["productId"])) {
                        $cart[] = $_GET["productId"];
                        $_SESSION['cart']=$cart;
                    }
                    

                    foreach ($_SESSION['cart'] as $key => $value) {
                        $sql = "SELECT * FROM `products` WHERE `product_id`='{$value}'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                                                        
                            while ($row = $result->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td><a class="remove" href="?dId=<?php echo $key ?>"><fa class="fa fa-close"></fa></a></td>
                                    <td><a href="#"><img src="<?php echo $row["image"] ?>" alt="img"></a></td>
                                    <td><a class="aa-cart-title" href="#"><?php echo $row["name"] ?></a></td>
                                    <td>$<?php echo $row["price"] ?></td>
                                    <td><input class="aa-cart-quantity" type="number" value="1"></td>
                                    <td>$<?php echo $row["price"] ?></td>
                                </tr>

                                <?php

                            }
                        }

                    }   
                    if (isset($_GET['dId'])) {
                        $id=$_GET['dId'];
                        unset($_SESSION['cart'][$id]);
                     }            
                    ?>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


<?php require_once 'footer.php' ?>