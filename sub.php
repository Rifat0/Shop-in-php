<?php 
require "function.php"; 
$hosoren = new hosoren();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

		
		$email = @$_GET['email'];
		

	$cart = $hosoren->sub($email);
	
	    header("Location:index.php");
}
 ?>

