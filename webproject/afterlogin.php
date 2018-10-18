<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Ranking & Game</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="favicon-green.ico">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
							<h1>Ranking & Game</h1>
							<p><?php 
								$dbhost='localhost';
								$dbname='highscore';
								$dbtablename='useraccount';
								$dbuser='root';
								$dbpass='';

								$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
								mysqli_select_db($conn,$dbname);
								mysqli_query($conn,"SET NAMES UTF8");
								$query="select * from $dbtablename";
								$qq = mysqli_query($conn, $query) ;			
								while($e = mysqli_fetch_assoc($qq)) $output[] = $e;
								mysqli_close($conn);
								for($i=0;$i<count($output);$i++){
									if($_POST['newaccount']==$output[$i]['account'] && $_POST['password']==$output[$i]['password']){
										echo "Hi, ".$output[$i]['username'];
										break;
									}
								}
								?>								
							</p>
						</header>
						
						<footer>
							<ul class="icons">
								<li><a href="login.html" class="fa-user">User</a></li>
								<li><a href="game.html" class="fa-gamepad">Game</a></li>
								<li><a href="rank.html" class="fa-trophy">Ranking</a></li>
							</ul>
						</footer>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<!-- <li>&copy; Jane Doe</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li> -->
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>