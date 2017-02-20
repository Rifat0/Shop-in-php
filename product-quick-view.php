<?php

require "function.php"; 
$hosoren = new hosoren();

$u_id = $_SESSION['uid'];
$username = $_SESSION['uname'];

$current_url = "index.php";

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
?>


<div class="white-popup product-quickview-popup">
    <div class="product">
        <div class="product-media">
            <div class="product-quickview-slider owl-carousel owl-carousel-inset">
                <div>
                    <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                </div>
                <div>
                    <img src="img/samples/products/grid/<?php echo $image ;?>" alt="">
                </div>
            </div>
        </div>
        <!-- /.product-media -->

        <div class="product-body">
            <h2 class="product-name">
                <a href="#" title=" Gin Lane Greenport Cotton Shirt"><?php echo $name ;?></a>
            </h2>
            <!-- /.product-name -->

            <div class="product-status">
                <span>In Stock</span>
                <span>-</span>
                <span>SKU: <?php echo $pid ;?></span>
            </div>
            <!-- /.product-status -->

            <div class="product-price">
                <span class="amount">$SKU: <?php echo $price ;?></span>
            </div>
            <!-- /.product-price -->

            <div class="product-description">
                <p><?php echo $details ;?></p>
            </div>

            <div class="product-list-actions-wrapper">
                
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

                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_qty">Qty</label>
                                <select name="quantity" id="p_qty" class="form-control">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                
                

                <div class="product-list-actions">
                    <a class="btn btn-lg btn-dark btn-outline" href="product_detail.php?id=<?php echo $id ;?>">
                    Details</a>
                </div>
                <!-- /.product-actions -->
            </div>

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
            </div>
 -->
        </div>
        <!-- /.product-body -->
    </div>
</div>

<script>
    $(function() {
        $('.product-quickview-slider').owlCarousel({
            items: 1,
            nav: true,
            dots: false
        });
    });
</script>
