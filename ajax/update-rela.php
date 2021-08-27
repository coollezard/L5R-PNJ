<?php
include("../connexion.php");


$pnjcible=$_POST['cibleA'];
$pnjrelation=$_POST['cibleB'];
$realtion1=$_POST['relation1'];
$realtion2=$_POST['relation2'];

$requete="INSERT INTO relations VALUES ('','$pnjrelation','$pnjcible','$realtion1');";
$requete.="INSERT INTO relations VALUES ('','$pnjcible','$pnjrelation','$realtion2');";
$resultat=$mysqli->query($requete);
?>
<p style="color:green;"> relation ajoutée</p>