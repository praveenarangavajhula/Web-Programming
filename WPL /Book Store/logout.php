<?php



session_start();
$user = 'root';
$password = '';
$db = 'bookstore';
$host = 'localhost';

$conn = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db
   
);


if (!$conn){

	exit;

}

$sql2 = "Drop table shoppingcart";

$result1 = mysqli_query($conn, $sql2);


session_start();
unset($_SESSION['name']);
session_destroy();

header("Location: login.html");
exit;
?>