
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{


if ((empty($_POST['name'])) || (empty($_POST['password'])))
{

	
	Header("Location:login.html");
	exit();
	
}

	
$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($host,$dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = mysqli_real_escape_string($conn, $_POST['name']);
$sql = "SELECT * FROM user WHERE UserName='$uname'";
$pwd = mysqli_real_escape_string($conn, $_POST['password']);
$sql1 = "SELECT * FROM user WHERE Password='$pwd'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
        $row = $result->fetch_assoc();
        echo "username: " . $row['UserName'] . "<br>";
        session_start();
         $_SESSION['name'] = $_POST['name'];
    }
else {

	Header("Location:login.html");
	exit();
 
}

if ($result1->num_rows > 0) {
    // output data of each row
        $row1 = $result1->fetch_assoc();
        echo "password: " . $row['Password'] . "<br>";
             $_SESSION['password'] = $_POST['password'];
             Header("Location:books.php");
    }
    else {

	Header("Location:login.html");
	exit();

}


$conn->close();







}
?> 

