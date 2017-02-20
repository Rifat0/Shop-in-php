<?php
	include"header.php";

	if(isset($_GET['id_p'])){

		$GLOBALS['idp'] = $_GET['id_p'];
		//echo $_GET['id'];
		

		$sql = "select * from shopping_cart WHERE id=".$_GET['id_p']."";
		$product=$pdo->query($sql);

		foreach ($product as $data){
			$qunt1 = $data['product_qunt'];

			$GLOBALS['qunt'] = $qunt1+1;
			$price1 = $data['price'];
			$GLOBALS['f_price'] = $price1*$qunt;
			
			//echo $qunt;
				
		}
	}elseif (isset($_GET['id_m'])) {

		$GLOBALS['idp'] = $_GET['id_m'];


		$sql = "select * from shopping_cart WHERE id=".$_GET['id_m']."";
		$product=$pdo->query($sql);

		foreach ($product as $data){
			$qunt2 = $data['product_qunt'];
			$price2 = $data['price'];
			
			$GLOBALS['qunt'] = $qunt2-1;
			$GLOBALS['f_price'] = $price2*$qunt;

			if ($qunt<1) {
					echo '<script type="text/javascript">'; 
					echo 'alert("You must have to add one product !");'; 
					echo 'window.location.href = "show_cart.php";';
					echo '</script>';
				return false;
			}

			//echo $qunt;
				
		}
	}

	//echo $qunt;
	
	
	global $pdo;
	$query = "UPDATE shopping_cart SET product_qunt=".$qunt.",f_price=".$f_price." WHERE id=".$idp."";
	$product=$pdo->query($query);
	//return true;
	header("Location: show_cart.php");
?>