<?php
	include"header.php";

	if(!empty($_GET['id'])){
	
	global $pdo;
	$query = "DELETE FROM shopping_cart WHERE id=".$_GET['id']."";
	$product=$pdo->query($query);
	//return true;
	header("Location: show_cart.php");
}