<?php require 'header.php';

            
            $n_pass = @$_GET['n_pass'];
            global $pdo;
            $query = "UPDATE user SET password=".$n_pass." WHERE id=".$_SESSION['uid']."";
            $product=$pdo->query($query);

            if ($product) {
            echo '<div class="alert alert-success ad">
                    Your password has been successfully changed .It works from your second login .
                  </div>'; 
            }

?>



        <div id="main">

            <div class="main-header background background-image-heading-checkout">
                <div class="container">
                    <h1>Change Password</h1>
                </div>
            </div>




            <form action="#" method="GET">
                <div class="checkout-wrapper">
                    <div class="container">

                       

                        <div class="row">
                            <div class="col-md-12">
                                <h2>Change </h2>

                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">Input Your New Password <sup>*</sup>
                                            </label>
                                            <input name="n_pass" type="password" class="form-control dark" placeholder="New Password" minlength="6" data-show-password="true" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    
                                </div>
								
								<div class="wc-proceed-to-checkout">
                                        <button type="submit" class="btn btn-lg btn-primary">Change</button>
                                    </div>
                                    
                                </form>
                               
                            </div>

                            
                        </div>
                    </div>
                    
                </div>


        </div>

<?php require 'footer.php';?>