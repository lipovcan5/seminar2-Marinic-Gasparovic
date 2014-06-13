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
	<script src="js/js-image-slider.js" type="text/javascript"></script>

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
	<a href="indexEN.html"> EN</a> | <a href="index.html"> HRV</a>
	<button style="position:relative; float:right; margin: 10px 10px;"><a href="<?php echo getUrl("odjava"); ?>">Odjavi se</a></button>

	<?php 
		if (isset($_SESSION['usr'])) {
		echo "<p style='position:relative; float:right; margin: 15px 10px; '>";
		echo $_SESSION['ime'] . ' ' . $_SESSION['prezime'];
		echo "</p>";
		}
	?>
	<section class="pozicija row">
			<div class="search-form row">
			<form class="form-container " action="pocetnaEN.php" method="GET">
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
		<a href="indexEN.html"><div class="povratak">Home</div></a>
		<p>Select city:</p>
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
			
		<p>Sort by:</p>
			<select name="cijena" id="" style="width:150px; height:27px;">
				<option value="0">Price</option>
				<option value="ASC">lowest first</option>
				<option value="DESC">highest first</option>
				
			</select>
		<p>Price:</p>
		<input placeholder="Start" name="od" type="number" style="width:50px;" >
		<input placeholder="End" name="do" type="number" style="width:50px; margin-left:38px;" >
		<input type="submit" value="Search" style="padding:10px; width:150px; margin-top:20px; background:rgb(240,84,18);">
		</div>
	</form>

	<div class="desno2 ">
		
	<?php 


	$id = $_POST['id'];
	$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta WHERE idKorisnik =$id");

			while($row = mysqli_fetch_array($result)) {
			$slika1=$row['slika1'];
			$ime=$row['naslovEN'];
			$dugiOpis=$row['dugiOpisEN'];

			}
			echo "<h2 style='text-align:center;'>$ime</h2>";

			mysqli_close($con);

	?>
		 <div id="sliderFrame">
        <div id="ribbon"></div>
        <div id="slider">
<?php 


	$id = $_POST['id'];
	$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta WHERE idKorisnik =$id");

			while($row = mysqli_fetch_array($result)) {
			$slika1=$row['slika2'];
			$slika2=$row['slika3'];
			$slika3=$row['slika4'];
			$slika4=$row['slika5'];
			$slika5=$row['slika6'];
			$slika6=$row['slika7'];
			$slika7=$row['slika8'];
			$slika8=$row['slika9'];
			
			}


			mysqli_close($con);

	            echo "<a href='#''>";
	            echo "<img src='$slika1' alt='Vanjska strana' />";
	            echo "</a>";
	            echo "<a class='lazyImage' href='$slika2' title='Neki opis'></a>";
	            echo "<a href='#'>";
	            echo "<b data-src='$slika3' data-alt='Neki opis'></b>";
	            echo "</a>";
	            echo "<a class='lazyImage' href='$slika4' title='Neki opis'></a>";
	            echo "<a class='lazyImage' href='$slika5' title='Neki opis'></a>";
	            echo "<a class='lazyImage' href='$slika6' title='Neki opis'></a>";
	            echo "<a class='lazyImage' href='$slika7' title='Neki opis'></a>";
	            echo "<a class='lazyImage' href='$slika8' title='Neki opis'></a>";
?>   
        </div>
        <div style="display: none;">
            <div id="htmlcaption3">
                <em>HTML</em> caption. Back to <a href="http://www.menucool.com/">Menucool</a>.
            </div>
            <div id="htmlcaption5">
                Smart Lazy Loading Image
            </div>
        </div>
             
        <!--thumbnails-->
        <div id="thumbs">
        <?php
        $id = $_POST['id'];
		$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta WHERE idKorisnik =$id");

			while($row = mysqli_fetch_array($result)) {
			$mslika1=$row['mslika1'];
			$mslika2=$row['mslika2'];
			$mslika3=$row['mslika3'];
			$mslika4=$row['mslika4'];
			$mslika5=$row['mslika5'];
			$mslika6=$row['mslika6'];
			$mslika7=$row['mslika7'];
			$mslika8=$row['mslika8'];
			echo $mslika1;
			}

            echo "<div class='thumb'><img src='$mslika1'/></div>";
            echo "<div class='thumb'><img src='$mslika2' /></div>";
            echo "<div class='thumb'><img src='$mslika3' /></div>";
            echo "<div class='thumb'><img src='$mslika4' /></div>";
            echo "<div class='thumb'><img src='$mslika5'/></div>";
            echo "<div class='thumb'><img src='$mslika6' /></div>";
            echo "<div class='thumb'><img src='$mslika7' /></div>";
            echo "<div class='thumb'><img src='$mslika8' /></div>";
        ?>
        </div>
    </div>

    <!-- tekst -->

	<div class="lijeviTekst">
<?php 


	$id = $_POST['id'];
	$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM oglas INNER JOIN slike ON oglas.idKorisnik=slike.idKorisnika INNER JOIN mjesta ON oglas.mjestoId = mjesta.idMjesto INNER JOIN valuta ON oglas.cValutaId = valuta.idValuta WHERE idKorisnik =$id");

			while($row = mysqli_fetch_array($result)) {
			$dugiOpis = $row['dugiOpisEN'];
			echo "<p>";
			echo $dugiOpis;
			echo "</p>";
			}


			mysqli_close($con);
?>
	</div>

	<div class="rezervacija">
	<p>Reservation</p>

	<form action="send_mail.php" method="POST">
	<?php
	if (!empty($_SESSION['usr'])) {
		$usr = $_SESSION['usr'];
		echo "<input value='$usr' name='usr' style='display:none;'>";
	}
	$id = $_POST['id'];
	if (!empty($_SESSION['ime'])) {
		$ime = $_SESSION['ime'];
		echo "<input value='$ime' name='ime' style='display:none;'>";
	}
	
	if (!empty($_SESSION['prezime'])) {
		$prezime = $_SESSION['prezime'];
		echo "<input value='$prezime' name='prezime' style='display:none;'>";
	}
	
	echo "<input value='$id' name='id' style='display:none;'>";
	
	
	
	?>
	<input name="od" placeholder="OD" class="textbox-n" type="text" onfocus="(this.type='date')"  id="date">
	<input name="do" placeholder="DO" class="textbox-n" type="text" onfocus="(this.type='date')"  id="date"> 
	<input type="submit" name="submit" value="Rezerviraj" style="padding:10px; width:150px; margin-top:20px; background:rgb(240,84,18);">
	</form>

	</div>
	<div style="margin-top:230px;"><h4>This suite includes:</h4></div>
	<div style="margin-top:30px;"><h5>The contents of the room:</h5></div>

<?php 


	$id = $_POST['id'];
	$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM korisnici INNER JOIN sadrzajsobe ON korisnici.id = sadrzajsobe.idKorisnika WHERE id=$id");

			while($row = mysqli_fetch_array($result)) {
			echo "<div style='margin-left:100px;'>";
			$privatniBazen = $row['privatniBazen'];
			echo "<p>";
			if ($privatniBazen) {
				echo "Private pool";
			}
			echo "</p>";
			$garderoba = $row['garderoba'];
			echo "<p>";
			if ($garderoba) {
				echo "wardrobe";
			}
			echo "</p>";
			$kamin = $row['kamin'];
			echo "<p>";
			if ($kamin) {
				echo "fireplace";
			}
			echo "</p>";
			$ventilator = $row['ventilator'];
			echo "<p>";
			if ($ventilator) {
				echo "fan";
			}
			echo "</p>";
			$grijanje = $row['grijanje'];
			echo "<p>";
			if ($grijanje) {
				echo "heating";
			}
			echo "</p>";
			$glacalo = $row['glacalo'];
			echo "<p>";
			if ($glacalo) {
				echo "iron";
			}
			echo "</p>";
			$perilicaRublja = $row['perilicaRublja'];
			echo "<p>";
			if ($perilicaRublja) {
				echo "Washing machine";
			}
			echo "</p>";
			$parketniPod = $row['parketniPod'];
			echo "<p>";
			if ($parketniPod) {
				echo "parquet floors";
			}
			echo "</p>";
			$radniStol = $row['radniStol'];
			echo "<p>";
			if ($radniStol) {
				echo "worktable";
			}
			echo "</p>";


			echo "</div>";
			}


			mysqli_close($con);
?>


<div style="margin-top:30px;"><h5>media:</h5></div>

<?php 


	$id = $_POST['id'];
	$con=mysqli_connect("localhost","root","root","smjestaj");

			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM korisnici INNER JOIN mediji ON korisnici.id = mediji.idKorisnika WHERE id=$id");

			while($row = mysqli_fetch_array($result)) {
			echo "<div style='margin-left:100px;'>";
			$racunalo = $row['racunalo'];
			echo "<p>";
			if ($racunalo) {
				echo "PC";
			}
			echo "</p>";
			$iPad = $row['iPad'];
			echo "<p>";
			if ($iPad) {
				echo "iPad";
			}
			echo "</p>";
			$igracaKonzola = $row['igracaKonzola'];
			echo "<p>";
			if ($igracaKonzola) {
				echo "Video game consoles";
			}
			echo "</p>";
			$laptop = $row['laptop'];
			echo "<p>";
			if ($laptop) {
				echo "Laptop";
			}
			echo "</p>";
			$kabelTv = $row['kabelTv'];
			echo "<p>";
			if ($kabelTv) {
				echo "Kabel TV";
			}
			echo "</p>";
			$cdUredaj = $row['cdUredaj'];
			echo "<p>";
			if ($cdUredaj) {
				echo "CD device";
			}
			echo "</p>";
			$dvdUredaj = $row['dvdUredaj'];
			echo "<p>";
			if ($dvdUredaj) {
				echo "DVD";
			}
			echo "</p>";
			$faks = $row['faks'];
			echo "<p>";
			if ($faks) {
				echo "Faks";
			}
			echo "</p>";
			$lcdTv = $row['lcdTv'];
			echo "<p>";
			if ($lcdTv) {
				echo "LCD TV";
			}
			echo "</p>";
			$tv = $row['tv'];
			echo "<p>";
			if ($tv) {
				echo "TV";
			}
			echo "</p>";
			$radio = $row['radio'];
			echo "<p>";
			if ($radio) {
				echo "Radio";
			}
			echo "</p>";
			$satelitTv = $row['satelitTv'];
			echo "<p>";
			if ($satelitTv) {
			echo "satelitTv";
			}
			echo "</p>";
			$telefon = $row['telefon'];
			echo "<p>";
			if ($telefon) {
			echo "Telefon";
			}
			echo "</p>";
			$videoUredaj = $row['videoUredaj'];
			echo "<p>";
			if ($videoUredaj) {
				echo "video device";
			}
			echo "</p>";




			echo "</div>";
			}


			mysqli_close($con);
?>
	</div><div


	</section><div

	<footer class="footer"></footer><div
	</section>
</body>
</html>
