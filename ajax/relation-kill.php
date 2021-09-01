<?php
include("../connexion.php");
$victime=$_POST['relala'];


//on recupère les infos de de la relation visée 
$requeteinit="SELECT * FROM relations WHERE id=$victime";
$phase1=$mysqli->query($requeteinit);
while($laliste=$phase1->fetch_assoc()){
    $alter_id=$laliste['id_pnj'];
    $alter_rela=$laliste['id_relation'];
    
    //$phase2="DELETE from relations WHERE id_pnj='".$laliste['id_relation']."' AND id_relation='".$laliste['id_pnj']."';";
    //$mysqli->query($phase2);
}

//on recupere les infos de la relation oposée 
$requetphase2="SELECT *FROM relations WHERE id_pnj='$alter_rela' AND id_relation='$alter_id'";
$phase2=$mysqli->query($requetphase2);
while($laliste2=$phase2->fetch_assoc()){
    $victime2=$laliste2['id'];
}


//enfin on efface les deux relations de la base 
$requete="DELETE from relations WHERE id=$victime OR id=$victime2";
$mysqli->query($requete);


echo $victime2;
?>
