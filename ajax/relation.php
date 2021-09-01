<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<?php

$cible=$_POST['id'];
//$cible=41;
include("../connexion.php");
$rqtrela="SELECT relations.id AS id, id_relation, relation, nom, famille, clan  FROM relations LEFT JOIN PNJ ON PNJ.id=id_relation WHERE id_pnj='$cible';";
$rela=$mysqli->query($rqtrela);
$accent=array('á','à','â','ä','ã','å','ç','é','è','ê','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
$pasaccent=array('a','a','a','a','a','a','c','e','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');

$pnj="";
$tabpnj=array();
$datalist="";
$rqtliste="SELECT id, famille,  nom  FROM PNJ ORDER BY famille, nom";
$liste=$mysqli->query($rqtliste);
while($laliste=$liste->fetch_assoc()){
    $datalist.="<option value='".$laliste['famille']." ".$laliste['nom']."'></option>";
    if($laliste['id']==$cible){
        $current=$laliste['famille'].' '.$laliste['nom'];
    }
}

?>



<div id="allscreen">
    <div id="grey"></div>
    <div id="relations">
        <div id='closerelation'>X</div>
        <h4>gestion des relations pour <br><?php echo $current; ?></h4>


        <div id="relationflex">
            <div id="relagauche">
                <h5>Relations actuelles : </h5>
                <ul class="relations2" id="relationpour<?php echo $cible; ?>">
                    <?php
            while($relation=$rela->fetch_assoc()){
                $clan=str_replace('z','',$relation['clan']);
                $clan=str_replace($accent,$pasaccent,$clan);
                if($relation['famille']!=$clan){
                    $famille=$relation['famille'];
                }else{
                    $famille="";
                }
                if($relation['famille']=="R" or $relation['famille']=="H" or $relation['famille']=="Mante" or $relation['famille']=="Tortue"){
                    $rela=" ";
                }
                $alt=$famille.$relation['nom'];
                $alt=str_replace(' ','',$alt);
                $identifiant=$relation['id_relation'];
                echo "<li class='relation2' id='larela".$relation['id']."' >$famille"." ".$relation['nom']." (".$relation['relation'].")   <span class='kill' value='".$relation['id']."'>X</span></li>";
            }
        ?>
                </ul>


            </div>
            <div id="reladroite">
                <h5> Ajouter une relation pour <br><?php echo $current; ?></h5>
                selectionner la relation

                <div>
                    <input type="select" list="selectguy" id="relaselect" name="relaselect">
                    <datalist id="selectguy">
                        <select>
                            <?php echo $datalist;?>
                        </select>
                    </datalist>
                    <input type="hidden" name="current" id="current" value="<?php echo $cible; ?>">
                    <input type="hidden" name="currentnom" id="currentnom" value="<?php echo $current; ?>">
                </div>
                <div id="inserte">
                </div>

            </div>
        </div>

    </div>
</div>
