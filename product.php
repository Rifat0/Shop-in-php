<?php require 'header.php';?>

<?php
	global $pdo;
				$sql = "select * from product";
                $product=$pdo->query($sql);

                foreach ($product as $data){

                $id= $data['id'];
                $image= $data['image'];
                $name= $data['name'];       
                $price= $data['price'];

                echo $price;
                }
                ?>
<?php require 'footer.php'; ?>