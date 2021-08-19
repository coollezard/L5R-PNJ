<?php
include("connexion.php");
$requete="SELECT * FROM PNJ WHERE id='".$_GET['id']."'";
$resultat=$mysqli->query($requete);
$perso=$resultat->fetch_assoc();
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
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2">
                        <a href="index.php"> &lt; retour</a>
                    </div>
                    <div class="col-md-10">
                        <h1 class="text-center">
                            <?php
                                echo $perso['famille']." ".$perso['nom'];
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            $clan=str_replace('z','',$perso['clan']);
                            $accent=array('á','à','â','ä','ã','å','ç','é','è','ê,','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
                            $pasaccent=array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
                            $clan=str_replace($accent,$pasaccent,$clan);      
                            
                            
                            if($perso['famille']!=$clan){
                                $image=$perso['famille']."_".$perso['nom'];
                            }else{
                                $image=$perso['nom'];
                            }
                        
                            if (file_exists('images/PNJ/'.$image.'.jpg')) {
                               $image=$image;
                            }else{
                                $image="inconnu";
                            }
                        
                            
                            echo "<img src='images/PNJ/".$image.".jpg' class='tronche'>";
                        ?>
                    </div>
                    <div class="col-md-7" id="postit">
                        <div>
                            <div class="row">
                                <div class="col-md-4" >
                                    <?php echo '<img src="images/'.$perso['sexe'].'" alt="" class="centreblock">'; ?>
                                </div>
                                <div class="col-md-4" >
                                    <p class="text-center" id="age">Age<br><?php echo $perso['age'] ?></p>
                                </div>
                                <div class="col-md-4" >
                                    <?php echo '<img src="images/'.$perso['vivant'].'.png" alt="" class="centreblock">'; ?>
                                </div>
                            </div>
                            <div class="row">
                               <p id="occup" >Occupation :  <?php echo $perso['occupation'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row longpart">
                        <div class="col-md-12" >
                            <h3>Caractere :</h3><p> <?php echo $perso['caractere'] ?></p>
                        </div>
                    </div>
                     <div class="row longpart">
                        <div class="col-md-12" >
                            <h3>Notes globales :</h3>
                            <p><?php echo $perso['note'] ?></p>
                        </div>
                    </div>
                </div>               
                
            </div>
            
            
            <div class="col-md-2">
                <?php
                             
                    echo "<img src='images/mons/clans/$clan.png' class='mon'>";
                    if (file_exists('images/mons/familles/'.$perso['famille'].'.png')) {
                         echo "<img src='images/mons/familles/".$perso['famille'].".png' class='mon2'>";
                    } 
                ?>
                
            </div>
        </div>
    </div>
    
</body>
</html>