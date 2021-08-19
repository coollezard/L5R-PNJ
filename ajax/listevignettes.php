<?php
include("../connexion.php");

$clan=$_POST['clan'];
$famille=$_POST['famille'];
$sexe=$_POST['sexe'];
$scenario=$_POST['scenario'];
$etat=$_POST['etat'];


$where="WHERE 1 ";

if($clan!=""){$where.= "AND clan='$clan' ";}
if($famille!="tout"){
    if($famille==""){
        $where.= "AND (famille='H' OR famille='R' OR famille='Tortue' OR famille='Mante') ";
    }else{
        $where.= "AND famille='$famille' ";
    }
}
if($famille==""){$where.= "AND (famille='H' OR famille='R' OR famille='Tortue' OR famille='Mante') ";}
if($sexe!="tout"){$where.= "AND sexe='$sexe' ";}
if($scenario!="tout"){$where.= "AND scn$scenario='1' ";}
if($etat!="tout"){$where.= "AND vivant='$etat' ";}



$requete="SELECT * FROM PNJ $where ORDER BY clan, famille, nom;";
$resultat=$mysqli->query($requete);
//echo $requete;




$clanencours="";
$familleencours="";
while($perso=$resultat->fetch_assoc()){
    $clan=str_replace('z','',$perso['clan']);
    $accent=array('á','à','â','ä','ã','å','ç','é','è','ê','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
    $pasaccent=array('a','a','a','a','a','a','c','e','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
    $clan=str_replace($accent,$pasaccent,$clan);
     if($perso['famille']!=$clan){
        $image=$perso['famille']."_".$perso['nom'];
        $famille=$perso['famille'];
    }else{
        $image=$perso['nom'];
        $famille="";
    }
    if($perso['famille']=="R" or $perso['famille']=="H" or $perso['famille']=="Mante" or $perso['famille']=="Tortue"){
        $famille=" ";
        $image=$perso['nom'];
    }
    if (file_exists('../images/PNJ/'.$image.'.jpg')) {
        $image=$image;
    }else{
        $image="inconnu";
    }
    $isdead="";
    if($perso['vivant']=="Non"){
        $isdead="<div class='minisoul'><img src='images/minidead.png' ></div>";


    }
    $alt=$famille.$perso['nom'];
    $alt=str_replace(' ','',$alt);
    $identifiant= $perso['id'];
    echo "
    <div class=\"minicarte\" id='$identifiant' alt='$alt'>
        <div class=\"miniportrait\" style=\"background-image: url('images/PNJ/".$image.".jpg')\">
            <div class='minibanner'>
                <div class='minimonclan'>
                    <img src='images/mons/clans2/".$clan.".png'>
                </div>
                ".$famille." ".$perso['nom']."
                <div class='minimonfamille'>
                    <img src='images/mons/familles2/".$perso['famille'].".png'>
                </div>
            </div>
            $isdead
        </div>
        <div class='miniactivite'>
            ".nl2br($perso['occupation'])."
        </div>
    </div>";
}
?>