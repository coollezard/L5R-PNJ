<?php
include("connexion.php");
$requete="SELECT * FROM PNJ ORDER BY clan, famille, nom";
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

    <!-- appel ajax -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Also include jQueryUI -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>
    <div class="container" id="main">
        <h1>les fichiers "S" d'Asako Tenma</h1>

        <div id="filtres">
            <div>
                <label for="clan">Clan </label>
                <div class="rouleau">
                    <select name="clan" id="clan" class="filtre">
                        <option value="">Tous</option>
                        <option value="Crabe">Crabe</option>
                        <option value="Dragon">Dragon</option>
                        <option value="Grue">Grue</option>
                        <option value="Lion">Lion</option>
                        <option value="Licorne">Licorne</option>
                        <option value="Phénix">Phénix</option>
                        <option value="Scorpion">Scorpion</option>
                        <option value="zMante">Mante</option>
                        <option value="zRenard">Renard</option>
                        <option value="zMille-Pattes">Mille-Pattes</option>
                        <option value="zLibellule">Libellule</option>
                        <option value="zMoineau">Moineau</option>
                        <option value="zFaucon">Faucon</option>
                        <option value="zLièvre">Lièvre</option>
                        <option value="zBlaireau">Blaireau</option>
                        <option value="zGuêpe">Guêpe</option>
                        <option value="zTortue">Tortue</option>
                        <option value="Impériale">Impériale</option>
                        <option value="zzRonin">Ronin</option>
                        <option value="zzHeimin">Heimin</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="clan">Famille</label>
                <div class="rouleau">
                    <select name="famille" id="famille" class="filtre">
                        <option value="tout">Toutes</option>
                        <option value="Agasha">Agasha</option>
                        <option value="Akodo">Akodo</option>
                        <option value="Asahina">Asahina</option>
                        <option value="Asako">Asako</option>
                        <option value="Bayushi">Bayushi</option>
                        <option value="Daidoji">Daidoji</option>
                        <option value="Doji">Doji</option>
                        <option value="Hida">Hida</option>
                        <option value="Hiruma">Hiruma</option>
                        <option value="Horiuchi">Horiuchi</option>
                        <option value="Ide">Ide</option>
                        <option value="Ikoma">Ikoma</option>
                        <option value="Isawa">Isawa</option>
                        <option value="Iuchi">Iuchi</option>
                        <option value="Kaiu">Kaiu</option>
                        <option value="Kakita">Kakita</option>
                        <option value="Kitsu">Kitsu</option>
                        <option value="Kitsuki">Kitsuki</option>
                        <option value="Kuni">Kuni</option>
                        <option value="Matsu">Matsu</option>
                        <option value="Mirumoto">Mirumoto</option>
                        <option value="Miya">Miya</option>
                        <option value="Moto">Moto</option>
                        <option value="Otomo">Otomo</option>
                        <option value="Seppun">Seppun</option>
                        <option value="Shiba">Shiba</option>
                        <option value="Shinjo">Shinjo</option>
                        <option value="Shosuro">Shosuro</option>
                        <option value="Soshi">Soshi</option>
                        <option value="Togashi">Togashi</option>
                        <option value="Utaku">Utaku</option>
                        <option value="Yasuki">Yasuki</option>
                        <option value="Yogo">Yogo</option>
                        <option value="Ichiro">Ichiro</option>
                        <option value="Kitsune">Kitsune</option>
                        <option value="Moshi">Moshi</option>
                        <option value="Suzume">Suzume</option>
                        <option value="Tonbo">Tonbo</option>
                        <option value="Tsuruchi">Tsuruchi</option>
                        <option value="Usagi">Usagi</option>
                        <option value="">Sans</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="sexe">Sexe</label>
                <div class="rouleau">
                    <select name="sexe" id="sexe" class="filtre">
                        <option value="tout">Tous</option>
                        <option value="homme">Homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="scenario">Scenario</label>
                <div class="rouleau">
                    <select name="scenario" id="scenario" class="filtre">
                        <option value="tout">Tous</option>
                        <option value="1">1 - Kyuden Kitsune</option>
                        <option value="2">2 - Kyuden Kitsune</option>
                        <option value="3">3 - Kyuden Doji</option>
                        <option value="4">4 - Sunda Mizu Mura</option>
                        <option value="5">5 - Turo Kojiri</option>
                        <option value="6">6 - Nikesake</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="etat">Etat</label>
                <div class="rouleau">
                    <select name="etat" id="etat" class="filtre">
                        <option value="tout">Tous</option>
                        <option value="oui">Vivant</option>
                        <option value="non">Mort</option>
                    </select>
                </div>
            </div>








        </div>
        <div id="socle"></div>

        <div id="tableau">

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
                if($perso['famille']=="R" or $perso['famille']=="H" or $perso['famille']=="Mante" or $perso['famille']=="Tortue"){
                    $famille=" ";
                    $image=$perso['nom'];
                }
                
                if (file_exists('images/PNJ/'.$image.'.jpg')) {
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
                $identifiant=$perso['id'];
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
                
                
               
               
                
                
                
                
            }?>
        </div>


    </div>



</body>

</html>
