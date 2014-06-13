
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
if(empty($_SESSION['usr'])){
    echo "Morate se prvo prijaviti da bi ste mogli rezervirati sobu!";
    echo "<button><a href='prijava.php'>Prijavi se</a><button>";
    echo "<button><a href='registracija.php'>Registriraj se</a><button>";
    exit();
}
if (empty($_POST['od']) or empty($_POST['do'])) {
    echo "Morate upisati datum da bi napravili rezervaciju!";
    exit();
}
if(isset($_POST['submit'])){
    $usr = $_POST['usr'];
    $id = $_POST['id'];
    
    $con=mysqli_connect("localhost","root","root","smjestaj");

            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($con,"SELECT * FROM users WHERE username ='$usr'");

            while($row = mysqli_fetch_array($result)) {
            $from = $row['mail'];
            }
             $result2 = mysqli_query($con,"SELECT * FROM korisnici WHERE id ='$id'");

            while($row = mysqli_fetch_array($result2)) {
            $mail = $row['mail'];
            }


            mysqli_close($con);

    $to = $mail; // this is your Email address
    $first_name = $_POST['ime'];
    $last_name = $_POST['prezime'];
    $subject = "Rezervacija";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" .'OD:'. $_POST['od'] . "\n " . 'DO'. $_POST['do'];
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
   // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>




    </div>
    </section>

    <footer class="footer"></footer>
    </section>
</body>
</html>