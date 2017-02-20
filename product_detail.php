<?php require 'header.php'; 

    $sql = "select * from product WHERE id=".$_GET['id']."";
    $product=$pdo->query($sql);

    foreach ($product as $data){
    $id = $data['id'];
    $pid = $data['product_id'];
    $image = $data['image'];
    $image_2 = $data['image_2'];
    $price = $data['price'];
    $name = $data['name'];
    $s_details = $data['s_details'];
    $details = $data['details'];
}
$current_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $query = "select * from comment WHERE product_id =".$_GET['id']."";
    $product=$pdo->query($query);

    $count = 0;
    $sum = 0;
    foreach ($product as $element) {
        $rarting =  $element['rate'];
        $count = $count + 1;
        $sum = $sum + $rarting;
    }
    if ($count>0) {
        $a_rate = $sum/$count;
        
    } else {
        $a_rate = 0;
        
    }
?>


        <div id="main">

            <!-- <div class="main-header background background-image-heading-product">
                <div class="container">
                    <h1>Product</h1>
                </div>
            </div> -->


            <div id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active"><span>Product</span>
                        </li>
                    </ol>

                </div>
            </div>


            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="product-slider-wrapper thumbs-bottom">

                            <div class="swiper-container product-slider-main">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="img/samples/products/grid/<?php echo $image ;?>" title="">
                                                <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="img/samples/products/grid/<?php echo $image ;?>" title="">
                                                <img src="img/samples/products/grid/<?php echo $image_2 ;?>" alt="">
                                            </a>
                                        </div>
                                    </div>

                                    

                                </div>

                                <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i>
                                </div>
                                <div class="swiper-button-next"><i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                            <!-- /.swiper-container -->

                            <div class="swiper-container product-slider-thumbs">
                                <div class="swiper-wrapper">


                                    <div class="swiper-slide">
                                        <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                                    </div>

                                    <div class="swiper-slide">
                                        <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.swiper-container -->

                        </div>
                        <!-- /.product-slider-wrapper -->
                    </div>

                    <div class="col-md-6">
                        <!-- <nav class="pnav">
                            <div class="pull-right">
                                <a href="#" class="btn btn-sm btn-arrow btn-default">
                                    <i class="fa fa-chevron-left"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-arrow btn-default">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>

                            <a href="#" class="back-to-pcate">
                                <i class="fa fa-chevron-left"></i>
                                <span>Back to Portfolio</span>
                            </a>
                        </nav> -->
                        <!-- /header -->

                        <div class="product-details-wrapper">
                            <h2 class="product-name">
                    <a href="#" title=" Gin Lane Greenport Cotton Shirt"> <?php echo $name ;?></a>
                </h2>
                            <!-- /.product-name -->

                            <div class="product-status">
                                <span>In Stock</span>
                                <span>-</span>
                                <small>SKU: <?php echo $pid ;?></small>
                            </div>
                            <!-- /.product-status -->

                            <div class="product-stars">
                                <?php 
                            if ($a_rate==0) {
                            ?>
                                <img src="img/rating/0.png" alt="" height="20" width="100">
                            <?php
                            } elseif ($a_rate==1) {
                            ?>
                            <img src="img/rating/1.png" alt="" height="20" width="100">
                            <?php
                            }elseif ($a_rate<=2) {
                            ?>
                            <img src="img/rating/2.png" alt="" height="20" width="100">
                            <?php
                            }elseif ($a_rate<=3) {
                            ?>
                            <img src="img/rating/3.png" alt="" height="20" width="100">
                            <?php
                            }elseif ($a_rate<=4) {
                            ?>
                            <img src="img/rating/4.png" alt="" height="20" width="100">
                            <?php
                            }elseif ($a_rate==5) {
                            ?>
                            <img src="img/rating/5.png" alt="" height="20" width="100">
                            <?php }
                            ?>
                                <!-- <span class="rating">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class=""></span>
                                <span class=""></span>
                                </span> -->
                            </div>
                            <!-- /.product-stars -->

                            <div class="product-description">
                                <p><?php echo $s_details ;?></p>
                            </div>
                            <!-- /.product-description -->

                            <div class="product-features">
                                <h3>Special Features:</h3>

                                <ul>
                                    <li>1914 translation by H. Rackham</li>
                                    <li>The standard Lorem Ipsum passage, used since the 1500s</li>
                                    <li>Section 1.10.33 of "de Finibus Bonorum et Malorum</li>
                                </ul>
                            </div>
                            <!-- /.product-features -->

                            <div class="product-actions-wrapper">
                                <div class="row">
                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="p_color">Color</label>
                                                <select name="p_color" id="p_color" class="form-control">
                                                    <option value="">Blue</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="p_size">Size</label>
                                                <select name="p_size" id="p_size" class="form-control">
                                                    <option value="">XL</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <form method="GET" action="add_to_cart.php">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="p_qty">Qty</label>
                                                <select name="quantity" id="p_qty" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                                <!-- /.form -->

                                <div class="product-list-actions">
                                    <span class="product-price">
                            <span class="amount">$<?php echo $price ;?></span>
                                    <!-- <del class="amount">$120</del> -->
                                    </span>
                                    <!-- /.product-price -->

                                    
                                        
                                        <input type="hidden" name="uid" value="<?php echo $u_id ?>" />
                                        <input type="hidden" name="user_name" value="<?php echo $username ?>">
                                        <input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
                                        <input type="hidden" name="id" value=" <?php echo $id ?>"></input>
                                        <input type="hidden" name="name" value=" <?php echo $name ?>"></input>
                                        <input type="hidden" name="price" value=" <?php echo $price ?>"></input>
                                        <button type="submit" class="btn btn-lg btn-primary">Add to cart</button>
                                    </form>

                                    <form method="get" action="wishlist.php" >
                                        
                                    <input type="hidden" name="uid" value="<?php echo $u_id ?>" />
                                    <input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
                                    <input type="hidden" name="user_name" value="<?php echo $username ?>">
                                    <input type="hidden" name="p_id" value="<?php echo $id ?>">
                                    <button type="submit" class="btn btn-lg btn-dark btn-outline">Add to wishlist</button>
                                    
                                    </form>
                                </div>
                                <!-- /.product-list-actions -->
                            </div>
                            <!-- /.product-actions-wrapper -->

                            <!-- <div class="product-meta">
                                <span class="product-category">
                        <span>Category:</span>
                                <a href="#" title="">Outerwear</a>
                                </span>

                                <span>-</span>

                                <span class="product-tags">
                        <span>Tags:</span>
                                <a href="#" title="">Jacket</a>
                                </span>
                            </div> -->
                            <!-- /.product-meta -->
                        </div>
                        <!-- /.product-details-wrapper -->
                    </div>
                </div>

                <div class="product-socials">
                    <ul class="list-socials">

                        <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="icon icon-twitter"></i></a>
                        </li>
                        <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="icon icon-facebook"></i></a>
                        </li>
                        <li><a href="#" data-toggle="tooltip" title="Dot-Dot"><i class="icon icon-dot-dot"></i></a>
                        </li>
                        <li><a href="#" data-toggle="tooltip" title="Google+"><i class="icon icon-google-plus"></i></a>
                        </li>
                        <li><a href="#" data-toggle="tooltip" title="Pinterest"><i class="icon icon-pinterest"></i></a>
                        </li>

                    </ul>
                </div>
                <!-- /.product-socials -->

                <div class="product-details-left">
                    <div role="tabpanel" class="product-details">
                        <nav>
                            <ul class="nav" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#product-description" data-toggle="tab">Description</a>
                                </li>
                                <li role="presentation">
                                    <a href="#product-infomation" data-toggle="tab">Additional Infomation</a>
                                </li>
                                <li role="presentation">
                                    <a href="#product-review" data-toggle="tab">Review</a>
                                </li>
                            </ul>
                            <!-- /.nav -->
                        </nav>
                        <!-- /nav -->

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="product-description">
                                <p><?php echo $details ;?></p>
                                </div>
                            <!-- /.tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="product-infomation">
                                <ul>
                                    <li>
                                        <span>Weight</span>
                                        <span class="value">8.6kg</span>
                                    </li>

                                    <li>
                                        <span>Color</span>
                                        <span class="value">Yellow, Brown</span>
                                    </li>

                                    <li>
                                        <span>Size</span>
                                        <span class="value">S, M, L, XL, XXL</span>
                                    </li>

                                    <li>
                                        <span>Material</span>
                                        <span class="value">Nylon, Coton</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.tab-pane -->

                            <div role="tabpanel" class="tab-pane" id="product-review">
                                <h3>Review</h3>

                                <ol class="product-review-list">

                                <?php 
                                    if(!empty($_GET['id'])){
                                    $sql = "select * from comment WHERE product_id=".$_GET['id']."";
                                    $product=$pdo->query($sql);
                                    }
                                    foreach ($product as $data){
                                        $id = $data['product_id'];
                                        $title = $data["title"]; 
                                        $name = $data['name'];
                                        $cmd = $data['comment'];
                                        $rate = $data['rate'];
                                ?>

                                
                                    <li>
                                        <h4 class="review-title"><?php echo $title ;?></h4>
                                        <div class="rating small">
                                            <?php 
                                            if ($rate==5) {
                                            ?>
                                                <img src="img/rating/5.png" alt="" height="20" width="100">
                                            <?php
                                            } elseif ($rate==4) {
                                            ?>
                                            <img src="img/rating/4.png" alt="" height="20" width="100">
                                            <?php
                                            }elseif ($rate==3) {
                                            ?>
                                            <img src="img/rating/3.png" alt="" height="20" width="100">
                                            <?php
                                            }elseif ($rate==2) {
                                            ?>
                                            <img src="img/rating/2.png" alt="" height="20" width="100">
                                            <?php
                                            }elseif ($rate==1) {
                                            ?>
                                            <img src="img/rating/1.png" alt="" height="20" width="100">
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="review-comment">
                                            <p><?php echo $cmd ;?></p>
                                        </div>

                                        <div class="review-meta">
                                            <span>Posted by</span>
                                            <a href="#" class="author"><?php echo $name ;?></a>
                                            <!-- <span>-</span>
                                            <span>February 17, 2015</span> -->
                                        </div>
                                    </li>

                                    <?php }?>

                                </ol>
                                <!-- /.product-review-list -->

                                <h3>Add a review</h3>

                                <form action="comment.php" method="GET">

                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <input type="hidden" name="return_url" value="<?php echo $current_url ?>" />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="reply-name">Name <sup>*</sup>
                                                </label>
                                                <input type="text" name="name" class="form-control" id="reply-name" placeholder="Name" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="reply-email">Email <sup>*</sup>
                                                </label>
                                                <input type="email" name="email" class="form-control" id="reply-email" placeholder="Email" required>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="reply-title">Title <sup>*</sup>
                                        </label>
                                        <input type="text" name="title" class="form-control" id="reply-title" placeholder="title" required>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-group">
                                        <label for="reply-text">Your review <sup>*</sup>
                                        </label>
                                        <textarea name="comment" class="form-control" id="reply-text" rows="7" placeholder="Your review" required></textarea>
                                    </div>
                                    <!-- /.form-group -->

                                    <div class="form-submit clearfix">
                                        <div class="review-rating">
                                            <span class="title">Your rating:</span>

                                            <span class="rating small live">
                                            <input  type="number" name="rate" min="1" max="5" required/>
                                            </span>

                                        </div>

                                        <div class="pull-right">
                                            <button type="submit" class="submit btn btn-lg btn-default">Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.form-submit -->
                                </form>
                                <!-- /form -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.product-details-left -->

                <div class="relared-products">
                    <div class="relared-products-header margin-bottom-50">
                        <h3 class="upper">Related Products</h3>
                    </div>

                    <div class="products owl-carousel" data-items="5">


                        <?php 
                                    
                        $sql = "select * from product";
                        $product=$pdo->query($sql);

                        foreach ($product as $data){

                        $id= $data['id'];
                        $image= $data['image'];
                        $name= $data['name'];       
                        $price= $data['price'];
                        ?>


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
                                        <!-- /.product-hover -->



                                    </div>
                                    <!-- /.product-media -->
                                    

                                    <div class="product-body">
                                        <h2 class="product-name">
                                    <a href="#" title="Gin Lane Greenport Cotton Shirt"><?php echo $name ;?></a>
                                </h2>
                                        <!-- /.product-product -->

                                        <!-- <div class="product-category">
                                            <span>Short</span>
                                        </div> -->
                                        <!-- /.product-category -->

                                        <div class="product-price">

                                            <span class="amount">$<?php echo $price ;?></span>

                                        </div>
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-body -->
                                </div>
                                <!-- /.product -->

                                <?php }?>
                    </div>
                </div>
                <!-- /.relared-products -->
            </div>

            <script>
                $(function() { aweProductRender(true); });
            </script>

        </div>

<?php require 'footer.php'; ?>