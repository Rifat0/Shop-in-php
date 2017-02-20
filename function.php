<?php
	ob_start();
?>

<?php
	require "config.php";

	/**
	* 
	*/
	class hosoren{

		function __construct(){
			$database = new DatabaseConnect();
		}
		public function registerUser($uname,$email,$pass){
			global $pdo;
			$query = $pdo->prepare("INSERT INTO user (type,username,email,password) VALUES (?,?,?,?)");
			$query->execute(array('user',$uname,$email,$pass));
			//$_SESSION['uname']=$_POST['username'];
			$_SESSION['type']="user";
			return true;

			
		}

		public function newadmin($username,$password){
			global $pdo;
			$query = $pdo->prepare("INSERT INTO user (type,username,email,password,image) VALUES (?,?,?,?,?)");
			$query->execute(array('admin',$username,'admin@hosoen.com',$password,'admin.jpg'));
			
			return true;

			
		}

		public function cname($cname){
			global $pdo;
			$query = $pdo->prepare("INSERT INTO catagory (c_title) VALUES (?)");
			$query->execute(array($cname));
			
			return true;
		}

		public function userlogin($uname,$pass){

			global $pdo;
			$query = $pdo->prepare("SELECT * FROM user WHERE username = ? AND password = ? ");
			$query->execute(array($uname,$pass));
			$userdata = $query->fetch();
			$num = $query->rowCount();

			if ($num == 1) {

				$_SESSION['login'] = true;
				$_SESSION['uid'] = $userdata['id'];
				$_SESSION['type'] = $userdata['type'];
				$_SESSION['uname'] = $userdata['username'];
				$_SESSION['email'] = $userdata['email'];

				
				return true;

				}
		}

		public function getSession(){
			return @$_SESSION['login'];
		}

		public function getIp() {
		$ip = $_SERVER['REMOTE_ADDR'];

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}

		return $ip;
		}

		public function comment($id,$name,$email,$title,$cmd,$rate){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO comment (product_id,name,email,title,comment,rate) VALUES (?,?,?,?,?,?)");
			$query->execute(array($id,$name,$email,$title,$cmd,$rate));
			return true;
		}

		public function wishlist($uid,$user_name,$p_id){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO wishlist (u_id,user_name,product_id) VALUES (?,?,?)");
			$query->execute(array($uid,$user_name,$p_id));
			return true;
		}

		public function add_to_cart($uid,$user_name,$p_id,$p_title,$p_qunt,$price,$f_price){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO shopping_cart (u_id,username,product_id,p_title,product_qunt,price,f_price) VALUES (?,?,?,?,?,?,?)");
			$query->execute(array($uid,$user_name,$p_id,$p_title,$p_qunt,$price,$f_price));
			return true;
		}

		public function order($order_id,$u_id,$fname,$lname,$ad1,$ad2,$city,$country,$email,$phone,$message,$total){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO order_details (order_id,u_id,fname,lname,ad1,ad2,city,country,email,phone,message,total) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$query->execute(array($order_id,$u_id,$fname,$lname,$ad1,$ad2,$city,$country,$email,$phone,$message,$total));
			return true;
		}

		public function order_product($order_id,$u_id,$user_name,$pid,$p_title,$pqunt,$price,$f_price){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO order_product (order_id,u_id,username,product_id,p_title,product_qunt,price,f_price) VALUES (?,?,?,?,?,?,?,?)");
			$query->execute(array($order_id,$u_id,$user_name,$pid,$p_title,$pqunt,$price,$f_price));
			return true;
		}

		public function add_slide($image,$link){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO slider (image,link) VALUES (?,?)");
			$query->execute(array($image,$link));
			return true;
		}

		public function add_product($Product_id,$Product_name,$Product_qunt,$Product_price,$Category,$Product_brand,$S_details,$Product_details,$image,$image2){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO product (product_id,name,quantity,price,category_id,brand,s_details,details,image,image_2) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$query->execute(array($Product_id,$Product_name,$Product_qunt,$Product_price,$Category,$Product_brand,$S_details,$Product_details,$image,$image2));
			return true;
		}

		public function add_category($category){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO catagory (c_title) VALUES (?)");
			$query->execute(array($category));
			return true;
		}

		public function add_brand($brand){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO brand (b_title) VALUES (?)");
			$query->execute(array($brand));
			return true;
		}

		public function coupon($coupon){

			global $pdo;
			$query = $pdo->prepare("SELECT * FROM coupon WHERE code = ? ");
			$query->execute(array($coupon));
			$userdata = $query->fetch();
			$num = $query->rowCount();

			if ($num == 1) {
				
				$_SESSION['discount_code'] = $userdata['code'];
				$_SESSION['discount'] = $userdata['discount'];
				
				return true;

				}
		}

		public function add_coupon($code,$money){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO coupon (code,discount) VALUES (?,?)");
			$query->execute(array($code,$money));
			return true;
		}

		public function sub($email){

			global $pdo;
			$query = $pdo->prepare("INSERT INTO sub (email) VALUES (?)");
			$query->execute(array($email));
			return true;
		}
		
	}
?>