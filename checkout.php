<?php require 'header.php';

$characters = '0123456789';
$order_id = '';
for ($i = 0; $i < 10; $i++) {
    $order_id .= $characters[rand(0, strlen($characters) - 1)];
}

    
    global $pdo;
    $query1 = "select * from shopping_cart WHERE u_id=".$u_id."";
    $product=$pdo->query($query1);
    

 ?>


        <div id="main">

            <div class="main-header background background-image-heading-checkout">
                <div class="container">
                    <h1>Checkout</h1>
                </div>
            </div>


            <div id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active"><span>Checkout</span>
                        </li>
                    </ol>

                </div>
            </div>


            <form action="order.php" method="POST">
                <div class="checkout-wrapper">
                    <div class="container">

                        <!-- <div class="text-alert">
                            <p>Returning customer? <a href="#">Click here to login</a>
                            </p>
                        </div> -->
                        <!-- /.text-alert -->

                        <div class="row">
                            <div class="col-md-6">
                                <h2>Billing Details</h2>

                                <!-- <div class="form-group">
                                    <label for="country">Country <sup>*</sup>
                                    </label>
                                    <select name="country" id="country" class="form-control dark">
                                    </select>
                                </div> -->
                                <!-- /.form-group -->

                                
                                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                                <input type="hidden" name="u_id" value="<?php echo $u_id ?>">

                                
                                    <div class="form-group">
                                        <label for="first_name">Name <sup>*</sup>
                                        </label>
                                        <input name="fname" type="text" class="form-control dark" value="<?php echo $username ?>" id="first_name" placeholder="First Name" required>
                                    </div>

                                <div class="form-group">
                                    <label for="company-name">Address - 1</label>
                                    <input name="ad1" type="text" class="form-control dark" id="company-name" placeholder="Address - 1" required>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label for="address">Address - 2 (if need)</label>
                                    <input name="ad2" type="text" class="form-control dark" id="address" placeholder="Address - 2" required>
                                </div>
                                <!-- /.form-group -->

                                <!-- <div class="form-group">
                                    <label for="address_2" class="sr-only"></label>
                                    <input type="text" class="form-control dark" id="address_2" placeholder="Apartment, suite, unit etc. (Optional)">
                                </div> -->
                                <!-- /.form-group -->

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="street-address">Town / City <sup>*</sup>
                                            </label>
                                            <input name="city" type="text" class="form-control dark" id="street-address" placeholder="Town / City" required>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="town_country">Country <sup>*</sup>
                                            </label>
                                            <input name="country" type="text" class="form-control dark" id="town_country" placeholder="Country" required>
                                        </div>
                                        
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_address">Email Address <sup>*</sup>
                                            </label>
                                            <input name="email" type="email" value="<?php echo $_SESSION['email']; ?>" class="form-control dark" id="email_address" placeholder="Email Address" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <sup>*</sup>
                                            </label>
                                            <input name="phone" type="text" class="form-control dark" id="phone" placeholder="Phone" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea name="message" name="order-notes" id="order-notes" class="form-control dark" rows="3" placeholder="Notes about your order, eg. special notes for delivery" required></textarea>
                                </div>
                                <!-- /.form-group -->

                                <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span>Create an account?</span>
                                    </label>
                                </div> -->
                                <!-- /.checkbox -->
                            </div>

                            <div class="col-md-6">
                                <div class="payment-right">
                                    <h2>Your payment details</h2>

                                    <div class="payment-detail-wrapper">
                                        <ul class="cart-list">

                                            <?php
                                            $total = 0;
                                            foreach ($product as $c_data){

                                            $pid = $c_data['product_id'];
                                            $wid = $c_data['id'];
                                            //echo $wid;
                                            $pqunt = $c_data['product_qunt'];
                                            
                                            $query2 = "select * from product WHERE id=".$pid."";
                                            $product2=$pdo->query($query2);

                                            

                                            foreach ($product2 as $data){
                                            $web_id = $data['product_id'];
                                            $name = $data['name'];
                                            $image = $data['image'];
                                            $price = $data['price'];
                                            $subtotal = $price * $pqunt;
                                            $total += $subtotal ;

                                            ?>

                                            <li>
                                                <div class="cart-item">
                                                    <div class="product-image">
                                                        <a href="product_detail.php?id=<?php echo $pid ;?>" title="">
                                                            <img src="img/samples/products/grid/<?php echo $image;?>" alt="" height="70" width="100">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="product-name">
                                                            <h3>
                                                    <a href="product_detail.php?id=<?php echo $pid ;?>" title=""><?php echo $name ;?></a>
                                                </h3>
                                                        </div>

                                                        <div class="product-price">
                                                            <span>$<?php echo $price ;?> <i class="icon icon-remove"></i> <?php echo $pqunt;?> = $<?php echo $price * $pqunt;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.cart-item -->

                                                <a href="remove_cart.php?id=<?php echo $wid?>" title="" class="remove-cart">
                                                    <span class="icon icon-remove"></span>
                                                </a>
                                            </li>

                                            <?php }}?>  

                                        </ul>
                                        <!-- /.cart-list -->
                                    </div>
                                    <!-- /.payment-detail-wrapper -->

                                   <!--  <div class="alert alert-dark">
                                        <p>You have a coupon? <strong><a href="#" title="">Click here to enter your code</a></strong>
                                        </p>
                                    </div> -->
                                    <!-- /.alert -->

                                    <div class="cart-total">
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal:</th>
                                                    <td><span class="amount">$<?php echo @$total; ?></span>
                                                    </td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping:</th>
                                                    <td>Free Shipping</td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total:</th>
                                                    <td><strong><span class="amount">$<?php echo @$total; ?></span></strong> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="wc-proceed-to-checkout">
                                        <button type="submit" class="btn btn-lg btn-primary">Check out</button>
                                    </div>
                                    <!-- /.wc-proceed-to-checkout -->
                                    <input type="hidden" name="total" value="<?php echo @$total; ?>">
                                    
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.checkout-wrapper -->
            </form>

        </div>


       <?php require 'footer.php'; ?>

