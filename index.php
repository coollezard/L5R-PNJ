<?php
include("connexion.php");
$requete="SELECT * FROM PNJ ORDER BY clan, famille";
$resultat=$mysqli->query($requete);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fiche S d'Asako Tenma </title>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container" id="main">
       <h1>les fichiers "S" d'Asako Tenma</h1>
       
        <?php
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
                if (file_exists('images/PNJ/'.$image.'.jpg')) {
                    $image=$image;
                }else{
                    $image="inconnu";
                }
                
                
                
                
                if($perso['famille']!=$familleencours and $familleencours!=""){
                    echo "</div>";//fermeture du blocfamille
                }
                if($perso['clan']!=$clanencours and $clanencours!=""){
                    echo "</div>";//fermeture de blocclan
                    echo "</div>";//fermeture de ligneclan
                    echo "<hr>";
                }
                
                
                
                
                if($perso['clan']!=$clanencours){
                    echo "<div class='row ligneclan'>";
                    echo "<div class='col-md-12 blocclan'>";
                    echo "<div class='row titreclan'>";
                    echo "<h2><img src='images/mons/clans/$clan.png' class='minimon'>".$clan."</h2>";
                    echo "</div>";
                    $clanencours=$perso['clan'];
                }
                            
                
                if($perso['famille']!=$familleencours){
                    
                    if (file_exists('images/mons/familles/'.$perso['famille'].'.png')) {
                         $imgfamille="<img src='images/mons/familles/".$famille.".png' class='minimon2'>";
                    }else{
                        $imgfamille="";
                    }
                    echo "<div class='col-md-2 blocfamille'>";
                    echo "<div class='row lignefamille'>";
                    echo "<h3>$imgfamille $famille</h3>";
                    echo "</div>";
                    $familleencours=$perso['famille'];   
                }
                               
                //Ligne de perso
                echo "<div class='row ligneMiniPerso'>";
                echo "<a href='fiche-s.php?id=".$perso['id']."' class='nomfiche'><img src='images/PNJ/".$image.".jpg' class='minitronche'>".$famille." ".$perso['nom']."</a>";
                echo "</div>";//femeture d'une ligne perso
                //Fin Ligne de perso
                
               
                
                
                
                
            }?>
    </div>
                
    
    
</body>
</html>