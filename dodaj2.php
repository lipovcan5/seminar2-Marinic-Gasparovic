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
		
			$naslov = $_POST['naslov'];
			$naslovEN = $_POST['naslovEN'];
			$kratkiOpis = $_POST['kratkiOpis'];
			$kratkiOpisEN = $_POST['kratkiOpisEN'];
			$dugiOpis = $_POST['dugiOpis'];
			$dugiOpisEN = $_POST['dugiOpisEN'];
			$cijena = $_POST['cijena'];
			$idValuta = $_POST['idValuta'];
			$idMjesto = $_POST['idMjesto'];
			$brojOsoba = $_POST['brojOsoba'];
			$idSmjestaj = $_POST['idSmjestaj'];

			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');
			$con=mysqli_connect("localhost","root","root","smjestaj");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			//$result = mysql_query($sql);

			$sql="INSERT INTO oglas (naslov, kratkiOpis, dugiOpis, cijena, cValutaId, mjestoId, brojOsoba, vrstaSmjestajaId, naslovEN, kratkiOpisEN, dugiOpisEN) VALUES ('$naslov', '$kratkiOpis', '$dugiOpis', '$cijena', '$idValuta', '$idMjesto', '$brojOsoba','$idSmjestaj','$naslovEN', '$kratkiOpisEN', '$dugiOpisEN')";

			if (!mysqli_query($con,$sql)) {
			  die('Error: ' . mysqli_error($con));
			}



			
			
		?>
		<h3>Sadrzaj sobe</h3>
		<!-- forma za unos sadržaja sobe -->

			<form action="dodaj3.php" method="POST">
			<div style="margin-bottom:10px;"><input type="checkbox" name="susiloZaRublje" value="1"> Susilo za rublje</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="privatniBazen" value="1"> PrivatniBazen</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="garderoba" value="1"> Garderoba</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="kamin" value="1"> Kamin</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="ventilator" value="1"> Ventilator</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="grijanje" value="1"> Grijanje</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="glacalo" value="1"> Glacalo</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="perilicaRublja" value="1"> Perilica rublja</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="parketniPod" value="1"> Parketni pod</div>
			<div style="margin-bottom:10px;"><input type="checkbox" name="radniStol" value="1"> Radni stol</div>
			

			<input type="submit" value="Dalje" style="width:180px; height:40px;">


		</form>
		<!-- ovdje zavrsava forma za unos -->
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>