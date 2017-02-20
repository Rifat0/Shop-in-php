<?php
	include"header.php";

	if(!empty($_GET['id'])){
		//echo $_GET['id'];

	global $pdo;
	$query = "DELETE FROM wishlist WHERE id=".$_GET['id']."";
	$product=$pdo->query($query);
	//return true;
	header("Location: show_wishlist.php");
}