<?php 


// Inialize session
session_start();



$link = mysqli_connect('localhost','root','root','smjestaj');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}

$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$user=$_POST['usr'];
$pass=$_POST['pwd'];
$pass2=$_POST['pwd2'];
$mail=$_POST['mail'];
if (empty($ime) || empty($prezime) || empty($user) || empty($pass) || empty($pass2) || empty($mail)) {
	header('Location:registracija.php');
	exit();
}
if(!($pass==$pass2)){
	header('Location:registracija.php');
	exit();
}

$criptPass = md5($pass);

$sql="INSERT INTO users (ime, prezime, username, password, mail)
VALUES ('$ime', '$prezime', '$user', '$criptPass', '$mail')";

if (!mysqli_query($link,$sql)) {
  die('Error: ' . mysqli_error($link));
}


if(empty($_GET["page"]))
	$page = "index";
else
	$page = $_GET["page"];

function getUrl($page){
	return "?page=$page";
}

$neki_sadrzaj = "";
$title = "";

switch($page){
	

	case "odjava":
		session_unset();
		session_destroy();
		header("location:index.html");
	break;


	/* Ovo se ozvodi ako se upise nepostojeca stranica */
	default:
		$neki_sadrzaj = "Stranica ne postoji";
}
	

?>
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
	<button style="position:relative; float:right; margin: 10px 10px;"><a href="<?php echo getUrl("odjava"); ?>">Odjavi se</a></button>
	<section class="pozicija row">

			<div class="search-form row">
			<form class="form-container " action="">
				<input placeholder="Pretrazi" type="text" class="search-field" value="Type search text here..." />
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
		<div class="lijevo2 ">
		<p>Odaberite grad:</p>
			<select name="" id="" style="width:150px; height:27px;">
				<option value="0">Grad</option>
				<option value="1">Zagreb</option>
				<option value="2">Zadar</option>
				<option value="3">Dubrovnik</option>
			</select>
		<p>Sortiraj po:</p>
			<select name="" id="" style="width:150px; height:27px;">
				<option value="0">Cijena</option>
				<option value="1">Ocjena</option>
				
			</select>
		<p>Cijena:</p>
		<input placeholder="OD" type="number" style="width:50px;" >
		<input placeholder="DO" type="number" style="width:50px; margin-left:38px;" >
		<input type="submit" value="Pretraži" style="padding:10px; width:150px; margin-top:20px; background:rgb(240,84,18);">
		</div>

	<div class="desno2 ">
	<p>Uspješno ste se registrirali, za prijavu kliknite ovdje <a href="prijava.php"><button>Prijavi se</button></a></p>



	</div>
	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>

