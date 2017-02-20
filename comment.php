
<?php
	include"header.php";
	require_once "function.php";
	$hosoren = new hosoren();

	if(isset($_SESSION['type']) && $_SESSION['type']=='user'){

	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		$url = $_GET['return_url'];

		$id = $_GET["id"]; 
		$name = $_GET["name"];
		$email = $_GET["email"]; 
		$title = $_GET["title"]; 
		$cmd = $_GET["comment"]; 
		$rate = $_GET["rate"];
	
	$commnd = $hosoren->comment($id,$name,$email,$title,$cmd,$rate);
	if ($commnd) {
	    header("Location:".$url);
	    exit();
	} else {
	    print("cmd not");
	}

	}
	}else{
		echo '<script type="text/javascript">'; 
		echo 'alert("You need to login first !");'; 
		echo 'window.location.href = "login.php";';
		echo '</script>';
	}


?>