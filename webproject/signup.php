<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="favicon-green.ico">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>

	<body class="is-loading">
		<div id="wrapper">
		<?php
			$dbhost='localhost';
			$dbname='highscore';
			$dbtablename='useraccount';
			$dbuser='root';
			$dbpass='';

			$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
			mysqli_select_db($conn,$dbname);
			mysqli_query($conn,"SET NAMES UTF8");
			mysqli_query($conn, "CHARACTER_SET_RESULTS=UTF8");
			$query="select * from $dbtablename";
			$qq = mysqli_query($conn, $query) ;
			while($e = mysqli_fetch_assoc($qq)) $output[] = $e;
			$flag1=1;
			for($i=0;$i<count($output);$i++){
				if($output[$i]['account']==$_POST['newaccount']){
					$flag1=0;
					break;
				}
			 }
			if($flag1==0)
				echo "<script>alert('此帳號已存在'); location.href = 'register_form.html';</script>";
			else
				echo "<script>alert('帳號創建成功'); location.href = 'login.html';</script>";

			$inputquery="insert into $dbtablename (username,account,password) values ('".$_POST['text1']."','".$_POST['newaccount']."','".$_POST['password']."')";
			mysqli_query($conn, $inputquery) ;
			mysqli_close($conn);

			// $conn=mysqli_connect($dbhost,$dbuser,$dbpass);
			// mysqli_select_db($conn,$dbname);
			// mysqli_query($conn,"SET NAMES UTF8");
			// $query="select * from $dbtablename";
			// $qq = mysqli_query($conn, $query) ;
			// while($e = mysqli_fetch_assoc($qq)) $output[] = $e;
			// for($i=0;$i<count($output);$i++){
			// 	echo $output[$i]['username']." ".$output[$i]['account']." ".$output[$i]['password']."<br>";
			// }
			
			// mysqli_close($conn);
		?>
		</div>
		<script>
			if ('addEventListener' in window) {
				window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
				document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
			}
		</script>
	</body>
</html>

