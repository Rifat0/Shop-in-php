<?php

class DatabaseConnect{
	public function __construct(){
		global $pdo;
		try{

			$pdo = new pdo('mysql:host=localhost;dbname=hosoren','root', '');

			}catch(PDOException $e){

				exit('Database error');
				
				}
			}
}

$shipping_cost      = 3.50; //shipping cost
$taxes              = 10;
?>