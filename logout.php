<?php 
$base_url="http://" . $_SERVER['SERVER_NAME'] . "/hosoren";
	session_start();
	session_destroy();
	//header("Location: ".$base_url);
	header('Location: index.php');
	die();


?>