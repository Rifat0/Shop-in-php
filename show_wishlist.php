<?php require 'header.php'; ?>

<div id="main">

            <div id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active"><span>Wishlist</span>
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
                                    <h2>Your Wishlist details</h2>

                                    <div class="payment-detail-wrapper">
                                        <ul class="cart-list">

                                            <?php
                                            $query1 = "select * from wishlist WHERE u_id=".$u_id."";
                                            $product=$pdo->query($query1);

                                            foreach ($product as $w_data){

                                            $pid = $w_data['product_id'];
                                            $wid = $w_data['id'];
                                            
                                            $query2 = "select * from product WHERE id=".$pid."";
                                            $product2=$pdo->query($query2);

                                            foreach ($product2 as $data){
                                            $web_id = $data['product_id'];
                                            $name = $data['name'];
                                            $image = $data['image'];
                                            $price = $data['price'];

                                            ?>

                                            <li>
                                                <div class="cart-item">
                                                    <div class="product-image">
                                                        <a href="product_detail.php?id=<?php echo $pid ;?>" title="">
                                                            <img src="img/samples/products/grid/<?php echo $image ;?>" alt="" height="70" width="100">
                                                        </a>
                                                    </div>

                                                    <div class="product-body">
                                                        <div class="product-name">
                                                            <h3>
                                                    <a href="product_detail.php?id=<?php echo $pid ;?>" title=""><?php echo $name ;?></a>
                                                </h3>
                                                        </div>

                                                        <div class="product-price">
                                                            <span>$<?php echo $price ;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.cart-item -->

                                                <a href="remove_wishlist.php?id=<?php echo $wid?>" title="" class="remove-cart">
                                                    <span class="icon icon-remove"></span>
                                                </a>
                                            </li>

                                            <?php }}?>

                                            

                                            

                                        </ul>
                                        <!-- /.cart-list -->
                                    </div>
                                    
                                    <!-- /.cart-total -->

                                    <div class="wc-proceed-to-checkout">
                                        <a class="btn btn-lg btn-primary" href="index.php">Continue Shopping</a>
                                    </div>
                                    <!-- /.wc-proceed-to-checkout -->

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