<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="css/stil.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/grid.css">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:400,700|Exo+2:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Kite+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

	<!-- jQuery Easing -->
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

	<!-- Functions -->
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
<section class="objedini row">
	<header class="header">
	<a href="prijavaEN.php"> EN</a> | <a href="prijava.php"> HRV</a>
	<section class="pozicija row">
			<div class="search-form row">
			<form class="form-container " action="pocetna.php" method="GET">
				<input placeholder="Pretrazi" name="grad" type="text" class="search-field" value="Type search text here..." />
				<div class="submit-container">
					<input type="submit" value="" class="submit" />
				</div>
			</form>
			<div class="popup ">
				<p>Morate upisati grad za pretraživanje.</p>
			</div>
		</div>
	</section>
	</header>
	<div class="odvojak"></div>
	<section class="container row">
		<div class="lijevo ">
			<h1>MarGas</h1>
			<p>The largest database to search and book accommodation in Croatia</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, alias animi rerum architecto ipsum quod magni? Temporibus, nostrum, distinctio voluptas possimus optio consequatur itaque fugiat perferendis expedita aspernatur alias sit?</p>
		</div>

		<div class="desno ">
		<section class="prijava2">

			<form action="loginEN.php" method="POST">
				<input type="text" name="usr" placeholder="Username" style="width:200px; height:30px; margin-left:200px;">
				<input type="password" name="pwd" placeholder="Password" style="width:200px; height:30px; margin-left:200px; margin-top:30px;">
				<input type="submit" value="Log in" style="width:200px; height:30px; margin-left:200px; margin-top:30px; background:rgb(240,84,18);">
					
			</form>

		</section>
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>