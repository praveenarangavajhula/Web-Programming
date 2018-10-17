<?php
    $year=($_GET['year']);
    $gender=($_GET['gender']);
    $con=mysqli_connect("localhost","root","root","hw3", 3306);
	
    if(mysqli_connect_errno()) {
		echo "failed to connect to mysql:" .mysqli_connect_error();
	}
	
	if($year==null && $gender==null){
		$sql="select * from babynames";
	}
	else if($year==null) {
		$sql="select * from babynames where gender='$gender'";
	}
	else if($gender==null) {
	    $sql="select * from babynames where year='$year'";
	}
	else{
	$sql="select * from babynames where gender='$gender' and year='$year'";
	}
	
	$result=mysqli_query($con,$sql);
	
	echo "<table border='1'>
	<tr>
	<th>Name</th>
	<th>Year</th>
	<th>Ranking</th>
	<th>Gender</th>
	</tr>";
	
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['ranking']."</td>";
	echo "<td>".$row['gender']."</td>";
	}
	echo "</table>";
	mysqli_close($con);
	
?>
	
	