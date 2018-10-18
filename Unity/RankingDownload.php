<?php

	$dbhost = 'localhost';
	
	$dbname = 'highscore';
	
	$dbtablename = 'ranking';
	
	$dbuser = 'root';
	
	$conn=mysqli_connect($dbhost,$dbuser) or die(mysqli_error($conn));
	
	mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
	
	if($_POST['download'] != NULL){
		
		$query = "select * from $dbtablename order by desc";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$row = mysqli_num_rows($result);
		
		for($cnt = 0; $cnt < $row; $cnt++)
		{
			$row = mysqli_fetch_array($result);
			echo "Name = ".$row[1];
			echo "Score = ".$row[2];
		}
	}
?>