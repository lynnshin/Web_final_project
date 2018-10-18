<?php

	$dbhost = 'localhost';
	
	$dbname = 'highscore';
	
	$dbtablename = 'rankingfordoodlejump';
	
	$dbuser = 'root';
	
	$conn=mysqli_connect($dbhost,$dbuser) or die(mysqli_error($conn));
	
	mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
	
	if($_POST['score'] != NULL){
		echo 'Ranking Update';
		
		$id = $_POST['id'];
		$name = $_POST['name'];
		$score = (int)$_POST['score'];
		
		$query = "insert into $dbtablename (id,name,score) values('$id','$name','$score')";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	}
	echo "hi"
?>