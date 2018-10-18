<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Ranking</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="favicon-green.ico">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<?php 
		$dbhost='localhost';
		$dbname='highscore';
		$dbtablename='rankingfordoodlejump';
		$dbuser='root';
		$dbpass='';
		$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
		mysqli_select_db($conn,$dbname);
		mysqli_query($conn,"SET NAMES UTF8");
		$query="select * from $dbtablename order by score desc";
		$qq = mysqli_query($conn, $query) ;			
		while($e = mysqli_fetch_assoc($qq)) {
			$output[] = $e;
		}
		mysqli_close($conn);
	?>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Rank -->
				<section id="rank">	
					<header>
						<h1> Ranking of Doodle Jump </h1>
						<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
						
					</header>

					<div id="ranking">
						<ul class="icons">
							<table style = "table-layout: fixed;">
							    <tr>
							        <th width=40% style="font-size: 150%">Ranking</th>
							        <th width=48% style="font-size: 150%">Name</th>
							        <th width=80% style="font-size: 150%">Score</th>
							    </tr>
							    <?php
									for($i=0; $i<10; $i++){
										if( $i < count($output)){
											echo'<tr>
										         <td><img src="images/'.($i+1).'.png"/></td>
										         <td>'. $output[$i]['name'] .'</td>
										         <td>'. $output[$i]['score'] .'</td>
										    </tr>';
										}	
									}
								?>
							</table>
						</ul>
						
					</div>

					<footer>
						<input type="button" value=" Home " onclick="javascript:location.href='log2.php'">
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