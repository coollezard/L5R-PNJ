<?php
include("../connexion.php");



$cible=$_POST['id'];
$cible=str_replace('a_','',$cible);
$requete="SELECT * FROM PNJ WHERE id=$cible";
$resultat=$mysqli->query($requete);
$zindex=$_POST['z'];
$pos=$_POST['pos'];
//echo $requete;

$requete2="SELECT id_relation, relation, nom, famille, clan  FROM relations LEFT JOIN PNJ ON PNJ.id=id_relation WHERE id_pnj='$cible';";
$resultat2=$mysqli->query($requete2);
$accent=array('á','à','â','ä','ã','å','ç','é','è','ê','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
$pasaccent=array('a','a','a','a','a','a','c','e','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
$relation="";
while($rela=$resultat2->fetch_assoc()){
    $clan=str_replace('z','',$rela['clan']);
   
    $clan=str_replace($accent,$pasaccent,$clan);
    if($rela['famille']!=$clan){
        $image=$rela['famille']."_".$rela['nom'];
        $famille=$rela['famille'];
    }else{
        $image=$rela['nom'];
        $famille="";
    }
    if($rela['famille']=="R" or $rela['famille']=="H" or $rela['famille']=="Mante" or $rela['famille']=="Tortue"){
        $rela=" ";
        $image=$rela['nom'];
    }

    if (file_exists('images/PNJ/'.$image.'.jpg')) {
        $image=$image;
    }else{
        $image="inconnu";
    }
    $isdead="";
    if($rela['vivant']=="Non"){
        $isdead="<div class='minisoul'><img src='images/minidead.png' ></div>";


    }
    $alt=$famille.$rela['nom'];
    $alt=str_replace(' ','',$alt);
    $identifiant=$rela['id_relation'];
    

    $relation.="<li class='relation' id='a_$identifiant' alt='$alt'>$famille"." ".$rela['nom']." (".$rela['relation'].")</li>";
}




$clanencours="";
$familleencours="";
while($perso=$resultat->fetch_assoc()){
    
    $clan=str_replace('z','',$perso['clan']);
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
        $isdead="<div class='bigsoul'><img src='images/bigdead.png' ></div>";
         $infovivant="Mort";
        if ($perso['sexe']=='Femme'){
            $infovivant.="e";
        }
       
    }else{
        $infovivant="En vie";         
    }
    $listeScenars="";
    for($i=1; $i<7; $i++){
        if ($perso['scn'.$i]=='1'){
            $listeScenars.=" $i -";
        }
    }
    $listeScenars=substr($listeScenars, 0, -1);
    
    $compresse=str_replace(' ','',$famille.$perso['nom']);

    echo "
        <div class='bigcarte' id='big".$compresse."' style='z-index:$zindex; top:".$pos."px; left:".$pos."px;' >
            <div class='close' id='".$compresse."'>X</div>
            <div class=\"biggauche\">
                <div class=\"bigportrait\" style=\"background-image: url('images/PNJ/".$image.".jpg')\">
                    <div class='bigbanner'>
                        <div class='bigmonclan'>
                            <img src='images/mons/clans2/".$clan.".png'>
                        </div>
                           ".$famille." ".$perso['nom']."
                        <div class='bigmonfamille'>
                            <img src='images/mons/familles2/".$perso['famille'].".png'>
                        </div>
                    </div>
                </div>
                <div class='bigactivite'>
                     ".nl2br($perso['occupation'])."
                </div>
                <div class='bigdetails'>
                    <div>Clan : ".$clan."</div>
                    <div>Sexe : ".$perso['sexe']."</div>
                    <div>Age :".$perso['age']."</div>
                </div>
            </div>
            <div class=\"bigdroit\">
                <div class=\"ligne1\">
                    <div>$infovivant</div>
                    <div>scénarios $listeScenars</div>
                </div>
                <div class=\"ligne2\"><span>Caractère : </span> ".$perso['caractere']."</div>
                <div class=\"ligne3\"><span>Notes : </span><br> ".nl2br($perso['note'])."</div>
                <div class=\"ligne4\">
                    <span>Relations :</span>
                    <ul class=\"relations\">
                    $relation
                       
                    </ul>
                </div>


            </div>
            <div id='editbtn' value='$cible'></div>
        </div>";
    
    
    
    
}
?>