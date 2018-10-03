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

	echo "Connection failed!";
	exit;

}

//shoppingcart (UserName, BookID, CurrentPrice)

// sql to create table
$sql = "CREATE TABLE shoppingcart ( 
Username varchar(50) ,
BookID INT(10) PRIMARY KEY,
CurrentPrice decimal(6,2) NOT NULL,
title tinytext
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created";
} else {
    echo " " . $conn->error;
}


$name=$_SESSION['name'];
$id=$_GET['id']; 
$title=$_GET['title'];
$price=$_GET['price']; 


$sql1 = "INSERT INTO shoppingcart(Username,BookID,CurrentPrice,title)
VALUES ('$name','$id','$price','$title')";

if ($conn->query($sql1) === TRUE) {
    echo "<br>Book added successfully to the cart";
} else {
    echo  "<br>Book already exists in the car";
}



echo "<table class='table table-striped'><tr><td>Title</td><td>List Price</td></tr>";
$sql2 = "SELECT * FROM shoppingcart";

$result1 = mysqli_query($conn, $sql2);
$sum=0;
while($row = mysqli_fetch_array($result1)){


	echo "<tr><td>". $row["title"] ."</td><td>". $row["CurrentPrice"]."</td><td>";


$sum+=$row["CurrentPrice"];


}



echo "</table>";
echo "<br><br>Total cart price :".$sum;

echo "<br><br><a href='books.php'> Continue Shopping </a>";
echo "<br>";
echo "<br><br><a href='logout.php'> Logout</a>";


$conn->close();

?>