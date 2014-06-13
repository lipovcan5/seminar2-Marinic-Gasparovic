

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

		$racunalo = 0;
		$iPad = 0;
		$igracaKonzola = 0;
		$laptop = 0;
		$kabelTv = 0;
		$cdUredaj = 0;
		$dvdUredaj = 0;
		$faks = 0;
		$lcdTv = 0;
		$tv = 0;
		$radio = 0;
		$satelitTv = 0;
		$telefon = 0;
		$videoUredaj = 0;

		if (isset($_POST['racunalo'])) {
			$racunalo = 1;
		}


		if (isset($_POST['iPad'])) {
			$iPad = 1;
		}
		if (isset($_POST['igracaKonzola'])) {
			$igracaKonzola = 1;
		}
		if (isset($_POST['laptop'])) {
			$laptop = 1;
		}
		if (isset($_POST['kabelTv'])) {
			$kabelTv = 1;
		}
		if (isset($_POST['cdUredaj'])) {
			$cdUredaj = 1;
		}
		if (isset($_POST['dvdUredaj'])) {
			$dvdUredaj = 1;
		}
		if (isset($_POST['faks'])) {
			$faks = 1;
		}
		if (isset($_POST['lcdTv'])) {
			$lcdTv = 1;
		}
		if (isset($_POST['tv'])) {
			$tv = 1;
		}
		if (isset($_POST['radio'])) {
			$radio = 1;
		}
		if (isset($_POST['satelitTv'])) {
			$satelitTv = 1;
		}
		if (isset($_POST['telefon'])) {
			$telefon = 1;
		}
		if (isset($_POST['videoUredaj'])) {
			$videoUredaj = 1;
		}



			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');
			$con=mysqli_connect("localhost","root","root","smjestaj");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			


			$sql2 = "SELECT idKorisnik FROM oglas ORDER BY idKorisnik DESC LIMIT 1";
			$result2 = mysql_query($sql2);
			while ($row = mysql_fetch_array($result2)) {
			    $zadnjired = $row['idKorisnik'];
			}


			//$result = mysql_query($sql);

			$sql="INSERT INTO mediji (idKorisnika, racunalo, ipad, igracaKonzola, laptop, kabelTv, cdUredaj, dvdUredaj, faks, lcdTv, tv, radio, satelitTv,telefon,videoUredaj)
					 VALUES ('$zadnjired', '$racunalo', '$iPad', '$igracaKonzola', '$laptop', '$kabelTv', '$cdUredaj','$dvdUredaj', '$faks', '$lcdTv', '$tv', '$radio', '$satelitTv', '$telefon', '$videoUredaj')";

			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}



			
			
		?>
	<h3>Hrana i piće</h3>
			<!-- forma za unos sadržaja sobe -->

			<form action="dodaj5.php" method="POST">
			<div style="margin-bottom:10px;"><input type="checkbox" name="blagavaonica" value="1"> Blagavaonica</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="kuhinjskiStol" value="1"> Kuhinjski stol</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pocnica" value="1"> Pećnica</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="toster" value="1"> Toster</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="rostilj" value="1"> Roštilj</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="kuhaloZaVodu" value="1"> Kuhalo za vodu</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="miniBar" value="1"> Mini bar</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="kuhinja" value="1"> Kuhinja</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="mikrovalna" value="1"> Mikrovalna</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="hladnjak" value="1"> Hladnjak</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="aparatZaKavu" value="1"> Aparat za kavu</div>

			<input type="submit" value="Dalje" style="width:180px; height:40px;">


		</form>
		<!-- ovdje zavrsava forma za unos -->

			
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>