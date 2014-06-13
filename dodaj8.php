

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

		$ime = 0;
		$prezime = 0;
		$usr = 0;
		$pass = 0;
		$mail = 0;



		
		if (isset($_POST['ime'])) {
			$ime = 1;
		}


		if (isset($_POST['prezime'])) {
			$prezime = 1;
		}
		if (isset($_POST['usr'])) {
			$usr = 1;
		}
		if (isset($_POST['pass'])) {
			$pass = 1;
		}
		if (isset($_POST['mail'])) {
			$mail = 1;
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

				$folder=$zadnjired;
				$putanja="slike/".$folder;
			
				if (!file_exists($putanja)) {
				    mkdir($putanja, 0777, true);
				}
				//This is the directory where images will be saved
				$target = $putanja."/";
		
				$target1 = $target . basename( $_FILES['Filename1']['name']);
				$target2 = $target . basename( $_FILES['Filename2']['name']);
				$target3 = $target . basename( $_FILES['Filename3']['name']);
				$target4 = $target . basename( $_FILES['Filename4']['name']);

				//This gets all the other information from the form
				$Filename1=basename( $_FILES['Filename1']['name']);
				$Filename2=basename( $_FILES['Filename2']['name']);
				$Filename3=basename( $_FILES['Filename3']['name']);
				$Filename4=basename( $_FILES['Filename4']['name']);


				//Writes the Filename to the server
				if(move_uploaded_file($_FILES['Filename1']['tmp_name'], $target1)) {
				    //Tells you if its all ok
				}
				echo "<br>";

				if(move_uploaded_file($_FILES['Filename2']['tmp_name'], $target2)) {
				    //Tells you if its all ok
				}
				if(move_uploaded_file($_FILES['Filename3']['tmp_name'], $target3)) {
				    //Tells you if its all ok
				}
			    if(move_uploaded_file($_FILES['Filename4']['tmp_name'], $target4)) {
				    //Tells you if its all ok
				}
				    // Connects to your Database
				    mysql_connect("localhost", "root", "root") or die(mysql_error()) ;
				    mysql_select_db("smjestaj") or die(mysql_error()) ;
				$cijelaPutanja1=$putanja . "/" . $Filename1;
	
				$cijelaPutanja2=$putanja . "/" . $Filename2;
	
				$cijelaPutanja3=$putanja . "/" . $Filename3;
	
				$cijelaPutanja4=$putanja . "/" . $Filename4;
		
				    //Writes the information to the database
				mysql_query("INSERT INTO slike (idKorisnika, slika1,slika2,slika3,slika4)
				VALUES ('$zadnjired', '$cijelaPutanja1', '$cijelaPutanja2','$cijelaPutanja3', '$cijelaPutanja4')");


?>
			<h3>Korisnički podaci</h3>
			<!-- forma za unos sadržaja sobe -->

			<form action="dodaj9.php" method="POST">
			<div style="margin-bottom:10px;"><input type="input" name="ime" placeholder="Ime"></div>
			<div style="margin-bottom:10px;"><input type="input" name="prezime" placeholder="Prezime"></div>
			<div style="margin-bottom:10px;"><input type="input" name="usr" placeholder="Username"></div>
			<div style="margin-bottom:10px;"><input type="password" name="pass" placeholder="Password"></div>
			<div style="margin-bottom:10px;"><input type="email" name="mail" placeholder="e-mail"></div>
			
			

			<input type="submit" value="Dalje" style="width:180px; height:40px;">

		</form>
		<!-- ovdje zavrsava forma za unos -->

			
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>