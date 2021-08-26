<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php

$cible=$_POST['myAid'];
//$cible=41;
include("../connexion.php");


//on crée une boucle pour récupérer l'identifiant et l'id des 2 protagonistes 
//$tabcible est pour le personnage de la fiche 
//$tabrelation est pour al relationque l'on souhaite lui associer 

$tabcible=array();
$tabcible['id']=$cible;
$tabcible['nom']='';

$tabrelation=array();
$tabrelation['id']='';
$tabrelation['nom']=$_POST['relation'];

$rqtliste="SELECT id, famille,  nom  FROM PNJ";
$liste=$mysqli->query($rqtliste);
while($laliste=$liste->fetch_assoc()){
    $pnj=$laliste['famille'].' '.$laliste['nom'];
    if($pnj==$tabrelation['nom']){
        $tabrelation['id']=$laliste['id'];
    }
    if($laliste['id']==$tabcible['id']){
        $tabcible['nom']=$pnj;
    }
    
}
//-------------------------------

?>



<form action="">
<input type="hidden" name='pnja' id="pnja" value="<?php echo $cible ?>">
<input type="hidden" name='pnjb' id="pnjb" value="<?php echo $tabrelation['id'] ?>">
<div>
    <?php echo $tabrelation['nom'] ?> est  le/la <input type="text" name="relaA" id="relaA"> de <?php echo $tabcible['nom'] ?>     
</div>

<div>
    <?php echo $tabcible['nom'] ?> est  le/la <input type="text" name="relaB" id="relaB"> de <?php echo $tabrelation['nom'] ?>     
</div>    
<div>
    <input type="button" id="sauver" name="sauver" value="enregistrer">
</div>    
    
</form>
