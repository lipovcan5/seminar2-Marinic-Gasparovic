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



$link = mysqli_connect('localhost','root','root','smjestaj');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}




$result = mysqli_query($link,"SELECT * FROM admin");
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
 $pass=$_POST['pass'];
 $encrypt_password=md5($pass);


// Retrieve username and password from database according to user's input
if(!(isset($_SESSION['usr']) && isset($_SESSION['pas']))) {
for ($j=0; $j < $a; $j++) { 
	if($_POST['usr']==$korisnik[$j] && md5($_POST['pass']) == $lozinka[$j]){
		$username=$korisnik[$j];
		$password=$lozinka[$j];
		$ime2=$ime[$j];
		$prezime2=$prezime[$j];
	}
}


if ($_POST['usr']==$username && md5($_POST['pass']) == $password) {
// Set username session variable
$_SESSION['usr'] = $_POST['usr'];
$_SESSION['pwd'] = $_POST['pass'];
$_SESSION['ime'] = $ime2;
$_SESSION['prezime'] = $prezime2;
}else
header('Location: admin.html');
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
	

$ime=$_SESSION['ime'];
$prezime=$_SESSION['prezime'];
		echo "<div class='imeKorisnika' style='margin-left:100px;'><p>Dobro dosao $ime $prezime </div>";

?>	
			</div>


	</section>

	<footer class="footer"></footer>
	</section>
</body>
</html>