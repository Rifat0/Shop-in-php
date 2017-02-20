<?php require 'header.php';
if(isset($_SESSION['type']) && $_SESSION['type']=='user'){
    
    global $pdo;
    $query1 = "select * from shopping_cart WHERE u_id=".$u_id."";
    $product=$pdo->query($query1);
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("You need to login first !");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }

 ?>

<div id="main">

            <div id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active"><span>Cart</span>
                        </li>
                    </ol>

                </div>
            </div>



            <form action="#" method="POST">
                <div class="checkout-wrapper">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-1"></div>
                            

                            <div class="col-md-9">
                                <div class="payment-right">
                                    <h2>Your Shopping Cart</h2>

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

                                                    <div>
                                                        <div class="product-body">
                                                            <tr>
                                                            <span >Change quantity</span>
                                                            <td >
                                                                &nbsp; &nbsp; &nbsp;<a href="quantity_update.php?id_p=<?php echo $wid ?>" name="q_plus" >+</a>
                                                                &nbsp;<span >
                                                                    <input type="text" name="quantity" value="<?php echo $pqunt; ?>" autocomplete="off" readonly>
                                                                &nbsp;</span>
                                                                <a href="quantity_update.php?id_m=<?php echo $wid?>">-</a>
                                                            </td>
                                                            </tr>
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
                                    
                                    <!-- /.payment-detail-wrapper -->

                                    <!-- <div class="alert alert-dark">
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
                                    <!-- /.cart-total -->

                                    <div class="wc-proceed-to-checkout">
                                        <a href="checkout.php" class="btn btn-lg btn-primary">Check out</a>
                                    </div>
                                    <!-- /.wc-proceed-to-checkout -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.checkout-wrapper -->
            </form>

        </div>
        
<?php require 'footer.php'; ?>