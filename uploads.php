<?php 
$folder="matija";
$putanja="slike/".$folder;
echo $putanja;
if (!file_exists($putanja)) {
    mkdir($putanja, 0777, true);
}
//This is the directory where images will be saved
$target = $putanja."/";
echo $target;
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
    echo "The file ". basename( $_FILES['Filename1']['name']). " has been uploaded, and your information has been added to the directory";
}
echo "<br>";

if(move_uploaded_file($_FILES['Filename2']['tmp_name'], $target2)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['Filename2']['name']). " has been uploaded, and your information has been added to the directory";
}
if(move_uploaded_file($_FILES['Filename3']['tmp_name'], $target3)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['Filename3']['name']). " has been uploaded, and your information has been added to the directory";
}
    if(move_uploaded_file($_FILES['Filename4']['tmp_name'], $target4)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['Filename4']['name']). " has been uploaded, and your information has been added to the directory";
}
    // Connects to your Database
    mysql_connect("localhost", "root", "root") or die(mysql_error()) ;
    mysql_select_db("smjestaj") or die(mysql_error()) ;
        $cijelaPutanja1=$putanja . "/" . $Filename1;
        echo $cijelaPutanja1;
        $cijelaPutanja2=$putanja . "/" . $Filename2;
        echo $cijelaPutanja2;
        $cijelaPutanja3=$putanja . "/" . $Filename3;
        echo $cijelaPutanja3;
        $cijelaPutanja4=$putanja . "/" . $Filename4;
        echo $cijelaPutanja4;
    //Writes the information to the database
    mysql_query("INSERT INTO slike (slika1)
    VALUES ('$cijelaPutanja1')");




?>