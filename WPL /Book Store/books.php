<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<?
$search = $_GET["search"];
?>


<form action="books.php" method="GET">
<input type="text" name="search" value="<? echo $search ?>">
<input type="submit" value="Search">
</form>






<?

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

$sql = "SELECT * FROM book";

if ($search){
  $sql .= " WHERE BookTitle LIKE '%$search%' ";

}

session_start();

$result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td>Book Title</td><td>List Price</td></tr>";


while($row = mysqli_fetch_array($result)){



	echo "<tr><td>". $row["BookTitle"] ."</td><td>". $row["ListPrice"]."</td><td>".


$id = $row["BookID"];
$price = $row["ListPrice"];

echo '<a href="cart.php?id='.$row["BookID"] .' & price='.$row["ListPrice"] .' & title='.$row["BookTitle"] .'     "/> Add</a>';


}

echo "</table>";

$conn->close();



?>

</body>
</html>