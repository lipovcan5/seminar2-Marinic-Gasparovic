<?php 


// Inialize session
session_start();



$link = mysqli_connect('localhost','root','root','smjestaj');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}




$result = mysqli_query($link,"SELECT * FROM users");
$a=mysqli_num_rows($result);


$i=0;
while($row = mysqli_fetch_array($result))
  {
  $korisnik[$i]=$row['username'];	
  $lozinka[$i]=$row['password'];
  $ime[$i]=$row['ime'];	
  $prezime[$i]=$row['prezime'];
  $i++;
  }
 $pass=$_POST['pwd'];
 $encrypt_password=md5($pass);


// Retrieve username and password from database according to user's input
if(!(isset($_SESSION['usr']) && isset($_SESSION['pwd']))) {
for ($j=0; $j < $a; $j++) { 
	if($_POST['usr']==$korisnik[$j] && md5($_POST['pwd']) == $lozinka[$j]){
		$username=$korisnik[$j];
		$password=$lozinka[$j];
		$ime2=$ime[$j];
		$prezime2=$prezime[$j];
	}
}


if ($_POST['usr']==$username && md5($_POST['pwd']) == $password) {
// Set username session variable
$_SESSION['usr'] = $_POST['usr'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['ime'] = $ime2;
$_SESSION['prezime'] = $prezime2;
}else
header('Location: prijava.php');
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
	case "index":
		$neki_sadrzaj = "<b>Dobro došao ".$_SESSION['ime']."</b>. <br /><br />
						Korisničko ime : ".$_SESSION['usr']." <br />
						Lozinka : ".$_SESSION['pwd'].""  ;
		$title = "Pocetna";
	break;

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
	

$ime=$_SESSION['ime'];
$prezime=$_SESSION['prezime'];
		echo "<div class='imeKorisnika' style='margin-left:100px;'><p>Dobro došao $ime $prezime </div>";

?>



	</div>
	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>

