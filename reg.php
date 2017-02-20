<?php require 'function.php'; 
$hosoren = new hosoren();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //$pass = md5($pass);
        $register = $hosoren->registerUser($uname,$email,$pass);
        if ($register) {
            header("Location:index.php ");
        exit();


        // echo $uname;
        // echo $pass;
        // echo $email;

        }
    }
?>

