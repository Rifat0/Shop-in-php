<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['type'])){
    if($_SESSION['type']!='user'){
    header("Location: admin/");
        die();
    }
}
require "function.php"; 
$hosoren = new hosoren();
// $base_url="http://" . $_SERVER['SERVER_NAME'] . "/eshopper";
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $uname = @$_POST['username'];
            $pass = @$_POST['password'];
            
            //$pass = md5($pass);
            $login = $hosoren->userlogin($uname,$pass);

            if ($login) {
                
                header("Location: index.php");
                } 

                else {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Username or Password do not match.");'; 
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                
                }
    
            }

$username = @$_SESSION['uname'];
$u_id = @$_SESSION['uid'];
$email = @$_SESSION['email'];
?>

<!DOCTYPE html>
<html class="no-js" lang="">


<!-- Mirrored from envato.megadrupal.com/html/hosoren/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 20:42:55 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hosoren</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700,400italic,700italic&amp;subset=latin,vietnamese">

    <link rel="icon" href="img/logo-dark.png" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/plugins.css">

    <link rel="stylesheet" href="css/styles.css">

    <script src="js/vendor.js"></script>

    <script>
        window.SHOW_LOADING = false;
    </script>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'js/analytics.js','ga');

            ga('create', 'UA-20585382-5', 'megadrupal.com');
            ga('send', 'pageview');
    </script>



<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','js/fbevents.js');

fbq('init', '1031554816897182');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1031554816897182&amp;ev=PageView&amp;noscript=1"
/></noscript>
</head>

<body>


    <!-- // LOADING -->
    <div class="awe-page-loading">
        <div class="awe-loading-wrapper">
            <div class="awe-loading-icon">
                <span class="icon icon-logo"></span>
            </div>

            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <!-- // END LOADING -->


    <div id="wrapper" class="main-wrapper ">


        <header id="header" class="awe-menubar-header">
            <nav class="awemenu-nav headroom" data-responsive-width="1200">
                <div class="container">
                    <div class="awemenu-container">

                        <div class="navbar-header">
                            <ul class="navbar-icons">


                                <li class="menubar-account">
                                    <a href="#" title="Account" class="awemenu-icon">
                                        <i class="icon icon-user-circle"></i>
                                        <span class="awe-hidden-text">Account</span>
                                    </a>

                                        <?php if(isset($_SESSION['uname'])){?>

                                        <ul class="submenu megamenu">

                                        <li>
                                            <div class="container-fluid">
                                                <div class="header-account">
                                                    <div class="header-account-avatar">
                                                        <a href="#" title="">
                                                            <img src="img/samples/avatars/customers/1.jpg" alt="" class="img-circle">
                                                        </a>
                                                    </div>

                                                    <div class="header-account-username">
                                                        <h4><a href="#"><?php echo $username ?></a></h4>
                                                    </div>
													
													<ul>
													
													<li><a href="change.php">Change Password</a>
													</li>
													<li><a href="Logout.php">Logout</a>
													</li>
													</ul>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>

                                    <?php  }else{?>

                                    <ul class="submenu dropdown">
                                        <li>
                                            <a href="#login-popup" title="">Login</a>
                                        </li>

                                        <li>
                                            <a href="#login-popup" title="">Register</a>
                                        </li>
                                    </ul>
                                        
                                    <?php } ?>
                                    
                                </li>

                                <li class="menubar-wishlist">
                                    <a href="#" title="Wishlist" class="awemenu-icon">
                                        <i class="icon icon-star"></i>
                                        <span class="awe-hidden-text">Wishlist</span>
                                    </a>

                                    <ul class="submenu megamenu">
                                        <li>
                                            <div class="container-fluid">
                                                <ul class="whishlist">

                                                    <?php if(isset($_SESSION['uname'])){?>

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
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="product_detail.php?id=<?php echo $pid ;?>" title="">
                                                                    <img src="img/samples/products/grid/<?php echo $image ;?>" alt="" height="70" width="100">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="product_detail.php?id=<?php echo $pid ;?>" title=""><?php echo $name ;?></a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$<?php echo $price ;?></strong>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="remove_wishlist.php?id=<?php echo $wid?>" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                    <?php }}?>

                                                </ul>

                                                <hr>

                                                <div class="whishlist-action">
                                                    <a href="show_wishlist.php" title="" class="btn btn-dark btn-lg btn-outline btn-block">View Wishlist</a>
                                                </div>

                                                <?php }else{ ?>

                                                <li>
                                                    <div class="container-fluid">
                                                        <span class="text-muted">You need to login first</span>
                                                    </div>
                                                </li>
                                                <?php }?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <?php
                                if(isset($_SESSION['type']) && $_SESSION['type']=='user'){
                                    
                                    global $pdo;
                                    $query1 = "select * from shopping_cart WHERE u_id=".$u_id."";
                                    $product9=$pdo->query($query1);
                                    $count = $product9->rowCount();
                                   } 
                                 ?>

                                <li class="menubar-cart">
                                    <a href="show_cart.php" title="Cart" class="awemenu-icon menu-shopping-cart">
                                        <i class="icon icon-shopping-bag"></i>
                                        <span class="awe-hidden-text">Cart</span>

                                        <span class="cart-number"><?php echo @$count;?></span>
                                    </a>
                                </li>


                            </ul>

                            <ul class="navbar-search">
                                <li>
                                    <a href="#" title="" class="awemenu-icon awe-menubar-search" id="open-search-form">
                                        <span class="sr-only">Search</span>
                                        <span class="icon icon-search"></span>
                                    </a>

                                    <div class="menubar-search-form" id="menubar-search-form">
                                        <form action="search.php" method="GET">
                                            <input type="text" name="s" class="form-control" placeholder="Search your entry here...">
                                            <div class="menubar-search-buttons">
                                                <button type="submit" class="btn btn-sm btn-white">Search</button>
                                                <button type="button" class="btn btn-sm btn-white" id="close-search-form">
                                                    <span class="icon icon-remove"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.menubar-search-form -->
                                </li>
                            </ul>

                        </div>

                        <div class="awe-logo">
                            <a href="index.php" title="">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- /.awe-logo -->


                        <ul class="awemenu awemenu-right">

                        <li class="awemenu-item">
                                <a href="#" title="">
                                    <span>All category</span>
                                </a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Collectibles  &amp; Art</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Antiquities</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Decorative Arts</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Furniture</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Musical Instruments &amp; Gear</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Guitars &amp; Basses</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Percussion</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">String</a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Home &amp; Garden</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Bath</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Bedding</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Crafts</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Clothing</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Men</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Women</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Baby</a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Electronics</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Cellphones</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Cameras &amp; Photo</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Vehicle Electronics</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Shoes</h5>

                                                        <ul class="super">
                                                            
                                                            <li><a href="p_category.php" title="">Men</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Women</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Baby</a>
                                                            </li>
                                                        </ul>
                                                        

                                                    </div>

                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Motors</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Cars &amp; Trucks</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Motorcycles</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Other Vehicles</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Sports</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Cricket</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Football</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Badminton</a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Toys &amp; Hobbies</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Action Figures</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Beanbag Plush</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Classic Toys</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Books</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Agriculture</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Biography &amp; Memoir</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Business</a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="col-lg-2">
                                                        <h5 class="upper">Fashion</h5>

                                                        <ul class="super">
                                                            
                                                            <li><a href="p_category.php" title="">Men</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Women</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Baby</a>
                                                            </li>
                                                        </ul>

                                                        <h5 class="upper">Other Categories</h5>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Video Games</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Travel</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Pottery &amp; Glass</a>
                                                            </li>
                                                        </ul>

                                                    </div>


                                                    <!-- <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="#" title="">
                                                                    <img src="img/samples/menu/trending-shop.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">The trend shop</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="#" title="">
                                                                    <img src="img/samples/menu/shirt-shop.jpg" alt="">
                                                                </a>
                                                                <div class="awe-media-overlay overlay-dark-50 fullpage">
                                                                    <div class="fp-table">
                                                                        <div class="fp-table-cell center">
                                                                            <a href="#" class="btn btn-white">Show now</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Shirt shop</a>
                                                        </h4>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <!-- <div class="bottom-link">
                                                    <a href="#" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Shop All Clothing</span>
                                                    </a>
                                                </div> -->

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="awemenu-item">
                                <a href="#" title="">
                                    <span>Electronics</span>
                                </a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">Electronics</h2>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Bestseller</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">New Arrivals</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">
                                                            <li><a href="p_category.php" title="#">Cellphones &amp; Accessories</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="#">Cameras &amp; Photo</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="#">Computers &amp; Tablets</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="#">Vehicle Electronics &amp; GPS</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="#">TV, Audio &amp; Surveillance</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">
                                                            <li><a href="p_category.php" title="">Video Games &amp; Consoles</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Featured Shops</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">iPhone</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Top Smartphones</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Wearable Tech</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/iphone.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">Hot Trend</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="#" title="">
                                                                    <img src="img/samples/menu/Samsung.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">New Arrivals</a>
                                                        </h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="p_category.php" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Shop All Electronics</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li class="awemenu-item">
                                <a href="#" title="">
                                    <span>Clothing</span>
                                </a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">Clothing</h2>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Bestseller</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">New Arrivals</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">

                                                        <li class="awemenu-item"><a href="p_category.php" title="">Men</a></li>


                                                            <li><a href="p_category.php" title="">Blazers &amp; Vests</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Graphics Tees</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Jeans</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Jackets &amp; Outerwear</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Pants</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">

                                                        <li class="awemenu-item"><a href="p_category.php" title="">Women</a></li>


                                                            <li><a href="p_category.php" title="">Shirts</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Short &amp; Swim</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Tees</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">Underwear &amp; Socks</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/trending-shop.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">The trend shop</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/shirt-shop.jpg" alt="">
                                                                </a>
                                                                <div class="awe-media-overlay overlay-dark-50 fullpage">
                                                                    <div class="fp-table">
                                                                        <div class="fp-table-cell center">
                                                                            <a href="p_category.php" class="btn btn-white">Show now</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">Shirt shop</a>
                                                        </h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="p_category.php" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Shop All Clothing</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="awemenu-item">
                                <a href="#" title="">
                                    <span>Shoes</span>
                                </a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">Shoes</h2>

                                                        <ul class="super">
                                                            <li><a href="p_category.php" title="">Bestseller</a>
                                                            </li>
                                                            <li><a href="p_category.php" title="">New Arrivals</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">
                                                            <li><a href="p_category.php">Boat Shoes</a>
                                                            </li>
                                                            <li><a href="p_category.php">Boots</a>
                                                            </li>
                                                            <li><a href="p_category.php">Casual Shoes</a>
                                                            </li>
                                                            <li><a href="p_category.php">Dress Shoes</a>
                                                            </li>
                                                            <li><a href="p_category.php">Sneakers</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/trending-shoes.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">Hot trend shoes</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/dress-shoes.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">New Arrivals</a>
                                                        </h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/womens-shoes.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">Hot trend shoes</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/Wedding.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">New Arrivals</a>
                                                        </h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="bottom-link">
                                                    <a href="p_category.php" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Shop All Shoes</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="awemenu-item">
                                <a href="#" title="">
                                    <span>Sports</span>
                                </a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">Sports</h2>

                                                        <ul class="super">
                                                            <li><a href="p_category.php">Bestseller</a>
                                                            </li>
                                                            <li><a href="p_category.php">New Arrivals</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <ul class="sublist">
                                                            <li><a href="p_category.php">Ball games</a>
                                                            </li>
                                                            <li><a href="p_category.php">Beach sports</a>
                                                            </li>
                                                            <li><a href="p_category.php">Summer sports</a>
                                                            </li>
                                                            <li><a href="p_category.php">Water sports‎</a>
                                                            </li>
                                                            <li><a href="p_category.php">Racing</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="#" title="">
                                                                    <img src="img/samples/menu/s1.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="#" title="">Hot trend</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="#" title="">
                                                                    <img src="img/samples/menu/s2.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">New Arrivals</a>
                                                        </h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/s3.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">Hot trend</a>
                                                        </h4>
                                                        </div>

                                                        <div class="awe-media inline">
                                                            <div class="awe-media-image">
                                                                <a href="p_category.php" title="">
                                                                    <img src="img/samples/menu/s4.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper center">
                                                            <a href="p_category.php" title="">New Arrivals</a>
                                                        </h4>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="p_category.php" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Shop All Sports</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- /.awemenu -->
                    </div>
                </div>
                <!-- /.container -->

            </nav>
            <!-- /.awe-menubar -->
        </header>
        <!-- /.awe-menubar-header -->

        <div id="login-popup" class="white-popup login-popup mfp-hide">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#account-login" aria-controls="account-login" role="tab" data-toggle="tab">Login</a>
                </li>

                <li role="presentation">
                    <a href="#account-register" aria-controls="account-register" role="tab" data-toggle="tab">Register</a>
                </li>
            </ul>
            <!-- /.nav -->

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="account-login">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="login-account">Account</label>
                            <input type="text" class="form-control" id="login-account" name="username" required>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" class="form-control" id="login-password" name="password" data-show-password="true" required>
                        </div>
                        <!-- /.form-group -->

                        <!-- <div class="forgot-passwd">
                            <a href="#" title="">
                                <i class="icon icon-key"></i>
                                <span>Forgot your password?</span>
                            </a>
                        </div> -->
                        <!-- /.forgot-passwd -->

                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div role="tabpanel" class="tab-pane" id="account-register">
                    <form action="reg.php" method="POST">
                        <div class="form-group">
                            <label for="register-username">Username <sup>*</sup>
                            </label>
                            <input type="text" class="form-control" name="uname" id="register-username" required>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="register-email">Email <sup>*</sup>
                            </label>
                            <input type="email" class="form-control" name="email" id="register-email" required>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="register-password">Password <sup>*</sup>
                            </label>
                            <input type="password" class="form-control" name="pass" minlength="6" id="register-password" data-show-password="true" required>
                        </div>
                        <!-- /.form-group -->

                        <!-- <div class="form-group">
                            <label for="register-confirm-password">Confirm Password <sup>*</sup>
                            </label>
                            <input type="password" class="form-control" id="register-confirm-password">
                        </div> -->
                        <!-- /.form-group -->

                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-warning btn-block">Register</button>
                        </div>
                        <!-- /.form-button -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    <!-- /.login-popup -->
	
	
	
	

    <script>
        $(function() {
            $('a[href="#login-popup"]').magnificPopup({
                type:'inline',
                midClick: false,
                closeOnBgClick: false
            });
        });
    </script>