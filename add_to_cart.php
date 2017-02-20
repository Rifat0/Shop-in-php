
<?php
	include"header.php";
	//require_once "function.php";
	$hosoren = new hosoren();

	if(isset($_SESSION['type']) && $_SESSION['type']=='user'){

	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		
		$url = @$_GET['return_url'];
		$uid = @$_GET['uid'];
		$user_name = @$_GET['user_name'];
		$p_id = @$_GET["id"]; 
		$p_title = @$_GET["name"]; 
	 	$p_qunt = @$_GET["quantity"];
	 	$price = @$_GET["price"];
	 	$f_price = $price*$p_qunt;

	 	print("found");
	 	
	
	$cart = $hosoren->add_to_cart($uid,$user_name,$p_id,$p_title,$p_qunt,$price,$f_price);
	if ($cart) {
	    header("Location:".$url);
	    exit();
	} else {
	    print("Error found");
	}
	 }}else{
		echo '<script type="text/javascript">'; 
		echo 'alert("You need to login first !");'; 
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}


?>

