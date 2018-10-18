<?php
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');
	$dbhost = 'localhost';
	
	$dbname = 'highscore';
	
	$dbtablename = 'useraccount';
	
	$dbuser = 'root';
	
	$conn=mysqli_connect($dbhost,$dbuser) or die(mysqli_error($conn));
	
	mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));

	$query="SELECT username FROM $dbtablename WHERE yesno=1";

	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	if($result){
		while($array = mysqli_fetch_array($result)){
				echo $array["username"];
		}
	}


?>