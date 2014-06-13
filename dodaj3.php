

<?php 


// Inialize session
session_start();

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
		header("location:admin.html");
	break;


	/* Ovo se ozvodi ako se upise nepostojeca stranica */
	default:
		$neki_sadrzaj = "Stranica ne postoji";
}




if(empty($_SESSION['usr'])){
	header('Location:admin.html');
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
			<h1>MarGas admin page</h1>
	</section>
	</header>
	<div class="odvojak"></div>
	<section class="container row">
	<div class="lijevo3">
			<div style="margin-bottom:10px; width:auto;">
				<a href="dodaj1.php"><div class="prijava">Dodaj novi smještaj</div></a>
			</div>
			<div style="margin-bottom:10px;">
				<a href="dodajGrad.php"><div class="prijava">Dodaj Grad</div></a>
			</div>
			<div style="margin-bottom:10px;">
				<a href="obrisi.php"><div class="prijava">Obriši</div></a>
			</div>
			
		</div>

		<div class="desno ">
		<?php 

		$susiloZaRublje = 0;
		$privatniBazen = 0;
		$garderoba = 0;
		$kamin = 0;
		$ventilator = 0;
		$grijanje = 0;
		$glacalo = 0;
		$perilicaRublja = 0;
		$parketniPod = 0;
		$radniStol = 0;

		if (isset($_POST['susiloZaRublje'])) {
			$susiloZaRublje = 1;
		}


		if (isset($_POST['privatniBazen'])) {
			$privatniBazen = 1;
		}
		if (isset($_POST['garderoba'])) {
			$garderoba = 1;
		}
		if (isset($_POST['kamin'])) {
			$kamin = 1;
		}
		if (isset($_POST['ventilator'])) {
			$ventilator = 1;
		}
		if (isset($_POST['grijanje'])) {
			$grijanje = 1;
		}
		if (isset($_POST['glacalo'])) {
			$glacalo = 1;
		}
		if (isset($_POST['perilicaRublja'])) {
			$perilicaRublja = 1;
		}
		if (isset($_POST['parketniPod'])) {
			$parketniPod = 1;
		}
		if (isset($_POST['radniStol'])) {
			$radniStol = 1;
		}


			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');
			$con=mysqli_connect("localhost","root","root","smjestaj");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			


			$sql2 = "SELECT idKorisnik FROM oglas ORDER BY idKorisnik DESC LIMIT 1";
			$result = mysql_query($sql2);
			while ($row = mysql_fetch_array($result)) {
			    $zadnjired = $row['idKorisnik'];
			}


			//$result = mysql_query($sql);

			$sql="INSERT INTO sadrzajSobe (idKorisnika, susiloZaRublje, privatniBazen, garderoba, kamin, ventilator, grijanje, glacalo, perilicaRublja, parketniPod, radniStol)
					 VALUES ('$zadnjired', '$susiloZaRublje', '$privatniBazen', '$garderoba', '$kamin', '$ventilator', '$grijanje','$glacalo', '$perilicaRublja', '$parketniPod', '$radniStol')";

			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}



			
			
		?>
			<h3>Mediji</h3>
			<!-- forma za unos sadržaja sobe -->

			<form action="dodaj4.php" method="POST">
			<div style="margin-bottom:10px;"><input type="checkbox" name="racunalo" value="1"> Računalo</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="iPad" value="1"> iPad</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="igracaKonzola" value="1"> Igraća konzola</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="laptop" value="1"> Laptop</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="kabelTv" value="1"> Kabelska</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="cdUredaj" value="1"> Cd uređaj</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="dvdUredaj" value="1"> DVD Uređaj</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="faks" value="1"> Faks</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="lcdTv" value="1"> LCD TV</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="tv" value="1"> TV</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="radio" value="1"> Radio</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="satelitTv" value="1"> Satelit TV</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="telefon" value="1"> Telefon</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="videoUredaj" value="1"> Video uređaj</div>

			<input type="submit" value="Dalje" style="width:180px; height:40px;">


		</form>
		<!-- ovdje zavrsava forma za unos -->

			
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>