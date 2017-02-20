 <?php require 'header.php'; 
 $keyword = mysql_real_escape_string($_REQUEST['s']);  
 $sql="SELECT * FROM `product` WHERE `name` LIKE :keyword OR `details` LIKE :keyword OR `price` LIKE :keyword OR `brand` LIKE :keyword ";


$query=$pdo->prepare($sql);
$query->bindValue(':keyword','%'.$keyword.'%');
$query->execute();



?>

        <div id="main">

            <section class="lookbook-wrapper">
                <div class="container">

                    <div class="products">
                        <div class="row">
                            <?php
                            while ($r=$query->fetch(PDO::FETCH_ASSOC)) {
                                    //echo"<pre>".print_r($r,true)."</pre>";
                                    $id = $r['id'];
                                    $name = $r['name'];
                                    $price = $r['price']; 
                                    $image = $r['image']; 
                            ?>

                            <div class="col-md-2 col-sm-2 col-xs-12">

                                <div class="product product-grid">
                                    <div class="product-media">
                                        <div class="product-thumbnail">
                                            <a href="product_detail.php?id=<?php echo $id ;?>" title="">
                                                <img src="img/samples/products/grid/<?php echo $image ;?>" alt="" class="current">
                                                <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                                            </a>
                                        </div>
                                        <!-- /.product-thumbnail -->


                                        <div class="product-hover">
                                            <div class="product-actions">
                                                <a href="product-quick-view.php?id=<?php echo $id ;?>" class="awe-button product-quick-view" data-toggle="tooltip" title="Quickview">
                                                    <i class="icon icon-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.product-media -->

                                    <div class="product-body">
                                        <h2 class="product-name">
                                    <a href="#" title="Gin Lane Greenport Cotton Shirt"><?php echo $name ;?></a>
                                </h2>
                                        <div class="product-price">

                                            <span class="amount">$<?php echo $price ;?></span>

                                        </div>
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-body -->
                                </div>
                                <!-- /.product -->

                            </div>

                            <?php }?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.products -->

                </div>
                <!-- /.container -->
            </section>
            <!-- /.lookbook-wrapper -->

        </div>


<?php require 'footer.php'; ?>