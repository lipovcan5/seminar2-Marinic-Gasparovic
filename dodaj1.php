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
		<h3>Osnovne informacije</h3>
		<form action="dodaj2.php" method="POST">
			<div style="margin-bottom:10px;"><input placeholder="Naslov smjestaja" type="text" name="naslov"></div>
			<div style="margin-bottom:10px;"><input placeholder="Naslov smjestaja na engleskom" type="text" name="naslovEN"></div>
			<div style="margin-bottom:10px;"><input placeholder="Kratki opis" type="text" name="kratkiOpis"></div>
			<div style="margin-bottom:10px;"><input placeholder="Kratki opis na engleskom" type="text" name="kratkiOpisEN"></div>
			<div style="margin-bottom:10px;"><input placeholder="Dugi opis" type="text" name="dugiOpis"></div>
			<div style="margin-bottom:10px;"><input placeholder="Dugi opis na engleskom" type="text" name="dugiOpisEN"></div>
			<div style="margin-bottom:10px;"><input placeholder="Cijena" type="text" name="cijena"></div>
			<p>Odaberite valutu:</p>
			<?php

			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');

			$sql = "SELECT imeValute, idValuta FROM valuta";
			$result = mysql_query($sql);

			echo "<select name='idValuta' style='width:150px; height:27px;''>";
			while ($row = mysql_fetch_array($result)) {
			    echo "<option value='" . $row['idValuta'] . "'>" . $row['imeValute'] . "</option>";
			}
			echo "</select>";

			?>
			<p>Odaberite grad:</p>
			<?php

			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');

			$sql = "SELECT nazivMjesto, idMjesto FROM mjesta";
			$result = mysql_query($sql);

			echo "<select name='idMjesto' style='width:150px; height:27px;''>";
			while ($row = mysql_fetch_array($result)) {
			    echo "<option value='" . $row['idMjesto'] . "'>" . $row['nazivMjesto'] . "</option>";
			}
			echo "</select>";

			?>
			<p></p>
			<div style="margin-bottom:10px;"><input placeholder="brojOsoba" type="text" name="brojOsoba"></div>
		
			<p>Vrsta smjestaja:</p>
			<?php

			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('smjestaj');

			$sql = "SELECT nazivSmjestaj, idSmjestaj FROM smjestaj";
			$result = mysql_query($sql);

			echo "<select name='idSmjestaj' style='width:150px; height:27px;''>";
			while ($row = mysql_fetch_array($result)) {
			    echo "<option value='" . $row['idSmjestaj'] . "'>" . $row['nazivSmjestaj'] . "</option>";
			}
			echo "</select>";

			?>

			<input type="submit" value="Dalje" style="width:180px; height:40px;">


		</form>
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>