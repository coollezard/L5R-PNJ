<?php
include("../connexion.php");


$pnjcible=$_POST['cibleA'];
$pnjrelation=$_POST['cibleB'];
$realtion1=$_POST['relation1'];
$realtion2=$_POST['relation2'];



$requete="INSERT INTO `relations` (`id`, `id_pnj`, `id_relation`, `relation`) VALUES ('',".$pnjcible.",$pnjrelation,'$realtion1');";
$mysqli->query($requete);
$requete="INSERT INTO `relations` (`id`, `id_pnj`, `id_relation`, `relation`) VALUES ('',".$pnjrelation.",$pnjcible,'$realtion2');";
$mysqli->query($requete);

?>

<p style="color:green;">
    relation ajoutée
</p>
