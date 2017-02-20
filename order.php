<?php require 'function.php';

$hosoren = new hosoren();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$order_id = @$_POST['order_id'];
		$u_id = @$_POST['u_id'];
		$fname = @$_POST['fname'];
		$lname = 0;
		$ad1 = @$_POST['ad1'];
		$ad2 = @$_POST['ad2'];
		$city = 0;
		$country = 0;
		$email =@ $_POST['email'];
		$phone = @$_POST['phone'];
		$message = @$_POST['message'];
		$total = @$_POST['total'];
		

		$order = $hosoren->order($order_id,$u_id,$fname,$lname,$ad1,$ad2,$city,$country,$email,$phone,$message,$total);

		global $pdo;
		$query1 = "select * from shopping_cart WHERE u_id=".$u_id."";
		$product=$pdo->query($query1);

		foreach ($product as $c_data){

			$u_id = $c_data['u_id'];
			
			$username = $c_data['username'];
			
			$pid = $c_data['product_id'];

			$p_title = $c_data['p_title'];
			
			$pqunt = $c_data['product_qunt'];

			$price = $c_data['price'];

			$f_price = $c_data['f_price'];
			

		$ord_product = $hosoren->order_product($order_id,$u_id,$username,$pid,$p_title,$pqunt,$price,$f_price);



		}
		global $pdo;
		$query4 = "DELETE FROM shopping_cart WHERE u_id=".$u_id."";
		$product8=$pdo->query($query4);

		if ($product8) {
			echo '<script type="text/javascript">'; 
			echo 'alert("Your order has been successfully submitted");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
		} else {
			echo '<script type="text/javascript">'; 
			echo 'alert("Sorry ,There is error in your order.");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
		}
		
	}
?>