
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{


if ((empty($_POST['name'])) || (empty($_POST['email'])) || (empty($_POST['password'])))
{

	
	Header("Location:login.html");
	exit();
	
}
elseif(! (bool)preg_match("/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/",($_POST['email'])) )
	{
      Header("Location:login.html");
    exit();
	}




	

elseif((strlen($_POST["password"]) <= '6') || (!preg_match("#[0-9]+#",$_POST["password"])) || (!preg_match("#[A-Z]+#",$_POST["password"])) || (!preg_match("#[a-z]+#",$_POST["password"]))  )
 {
    

     Header("Location:login.html");
	exit();
 }

else 
{
	 $_SESSION['name'] = $_POST['name'];
	 $_SESSION['email'] = $_POST['email'];
	 Header("Location: welcome.php");
	 exit();
}




}
?> 

