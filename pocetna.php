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
		<a href="indexEN.html"> EN</a> | <a href="index.html"> HRV</a>
	<?php 
		if (isset($_SESSION['usr'])) {
		echo "<p style='position:relative; float:right; margin: 15px 10px; '>";
		echo $_SESSION['ime'] . ' ' . $_SESSION['prezime'];
		echo "</p>";
		}
	?>

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
	<form action="pocetna.php" method="POST">
		<div class="lijevo2 ">
		<a href="index.html"><div class="povratak">Početna</div></a>
		<p>Odaberite grad:</p>
<?php

mysql_connect('localhost', 'root', 'root');
mysql_select_db('smjestaj');

$sql = "SELECT nazivMjesto FROM mjesta";
$result = mysql_query($sql);

echo "<select name='nazivMjesto' style='width:150px; height:27px;''>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['nazivMjesto'] . "'>" . $row['nazivMjesto'] . "</option>";
}
echo "</select>";

?>
			
		<p>Sortiraj po:</p>
			<select name="cijena" id="" style="width:150px; height:27px;">
				<option value="0">Cijena</option>
				<option value="ASC">Od najniže</option>
				<option value="DESC">Od najviše</option>
				
			</select>
		<p>Cijena:</p>
		<input placeholder="OD" name="od" type="number" style="width:50px;" >
		<input placeholder="DO" name="do" type="number" style="width:50px; margin-left:38px;" >
		<input type="submit" value="Pretraži" style="padding:10px; width:150px; margin-top:20px; background:rgb(240,84,18);">
		</div>
	</form>

	<div class="desno2 ">
		<?php 
		if(isset($_POST['cijena'])){
			$cijena=$_POST['cijena'];
		}
		if (isset($_POST['nazivMjesto'])) {
				$mjesto=$_POST['nazivMjesto'];
		}
		
			$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if (isset($_GET['grad'])) {
				$grad=$_GET['grad'];
				$result = mysqli_query($con,"SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta WHERE mjesta.nazivMjesto ='$grad'");
				//mysql_query($query);
			}
			
			if (empty($grad)) {
					
			$od=$_POST['od'];

			$do=$_POST['do'];

			
			unset($sql);

			if ($mjesto) {
			    $sql[] = " nazivMjesto = '$mjesto' ";
			}

			if ($od or $do) {
			    $sql[] = " (cijena >= $od AND cijena <= $do)";
			}

			// if($do){
			// 	 $sql[] = " cijena < '$do' ";
			// }
						

		
			$query = "SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta";

			if (!empty($sql)) {
			    $query .= ' WHERE ' . implode(' AND ', $sql);
			}
			unset($sql);
			if ($cijena) {
			    $sql[] = "$cijena";
			    $query .= ' ORDER BY cijena ' . implode($sql);
			}
			$result = mysqli_query($con,$query);
			
			}
			while($row = mysqli_fetch_array($result)) {
			$slika1=$row['slika1'];
			$id=$row['idKorisnik'];
			echo "<form action='odabir.php' method='POST'>";
			echo "<div class='cijeliDiv'>";
			  echo "<input type='text' name='id' value='$id' style='display:none;'>";
	
			  echo "<div class='slikica' style='width:30%; padding-top:20px; position:relative; float:left;'><input type='image' name='your_image_name' src='$slika1' style='width:200px; height:133px;' /></div>";
			  echo "<div class='tekstic' style='width:60%; margin-left:20px; position:relative; float:left;'><h2>".$row['naslov']."</h2></div>";
			  echo "<div class='tekstic' style='width:60%; margin-left:20px; position:relative; float:left;'><p>".$row['kratkiOpis']."</p></div>";
			  echo "<div class='tekstic' style='width:60%; margin-left:20px; position:relative; float:left;'><p>".'Cijena:'.$row['cijena'].$row['imeValute']."</p></div>";
			echo "</div>";
			echo "</form>";
			  echo "<br>";
			  echo "<br>";
			  echo "<br>";
			  echo "<br>";
			}


			mysqli_close($con);
		?>



	</div>
	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>