<?php
include 'login.php';

if(empty($_SESSION)) // if the session not yet started 
   session_start();

if( !isset($_SESSION['name'])) 
{
	header('Location: login.html');
	exit();	
}
?>





<html>

<body>
<?php
if (!isset($_SESSION['count'])){
  $_SESSION['count'] = "0";
}
$_SESSION['count']++; 
?>



<form method="POST" action="welcome.php">

Welcome <?php echo $_SESSION['name']; ?>,
 


<h4>You have visited this page <?php echo( $_SESSION['count'] ); ?> times in this session</h4>



<button><a href="logout.php">Logout</a></button>
<button><a href="welcome.php">Reload</a></button>
</form>
</body>
</html>