

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

		$blagavaonica = 0;
		$kuhinjskiStol = 0;
		$pocnica = 0;
		$toster = 0;
		$rostilj = 0;
		$kuhaloZaVodu = 0;
		$miniBar = 0;
		$kuhinja = 0;
		$mikrovalna = 0;
		$hladnjak = 0;
		$aparatZaKavu = 0;

		
		if (isset($_POST['blagavaonica'])) {
			$blagavaonica = 1;
		}


		if (isset($_POST['kuhinjskiStol'])) {
			$kuhinjskiStol = 1;
		}
		if (isset($_POST['pocnica'])) {
			$pocnica = 1;
		}
		if (isset($_POST['toster'])) {
			$toster = 1;
		}
		if (isset($_POST['rostilj'])) {
			$rostilj = 1;
		}
		if (isset($_POST['kuhaloZaVodu'])) {
			$kuhaloZaVodu = 1;
		}
		if (isset($_POST['miniBar'])) {
			$miniBar = 1;
		}
		if (isset($_POST['kuhinja'])) {
			$kuhinja = 1;
		}
		if (isset($_POST['mikrovalna'])) {
			$mikrovalna = 1;
		}
		if (isset($_POST['hladnjak'])) {
			$hladnjak = 1;
		}
		if (isset($_POST['aparatZaKavu'])) {
			$aparatZaKavu = 1;
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

			$sql="INSERT INTO hranapice (idKorisnika, blagavaonica, kuhinjskiStol, pocnica, toster, rostilj, kuhaloZaVodu, miniBar, kuhinja, mikrovalna, hladnjak, aparatZaKavu)
					 VALUES ('$zadnjired', '$blagavaonica', '$kuhinjskiStol', '$pocnica', '$toster', '$rostilj', '$kuhaloZaVodu','$miniBar', '$kuhinja', '$mikrovalna', '$hladnjak', '$aparatZaKavu')";

			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}



			
			
		?>
			<h3>Vanjski dio</h3>
			<!-- forma za unos sadržaja sobe -->

			<form action="dodaj6.php" method="POST">
			<div style="margin-bottom:10px;"><input type="checkbox" name="balkon" value="1"> Balkon</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="terasa" value="1"> Terasa</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaMore" value="1"> Pogled na more</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaJezero" value="1"> Pogled na jezero</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaBazen" value="1"> Pogled na bazen</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaPlaninu" value="1"> Pogled na planinu</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaGrad" value="1"> Pogled na grad</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="pogledNaRijeku" value="1"> Pogled na rijeku</div>
			

			<input type="submit" value="Dalje" style="width:180px; height:40px;">


		</form>
		<!-- ovdje zavrsava forma za unos -->

			
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>