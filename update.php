<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>L5R PNJ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include('connexion.php');
    

    $json_source = file_get_contents('json/L5R Liste des PNJ - Feuille 3.json');  
    
    $json_data = json_decode($json_source);
    var_dump($json_data);
    //le var_dump () permet d'afficher tout le fichier json
    $update=0;
    $add=0;
    
    

    foreach($json_data as $v){
        $requete_detect="SELECT * FROM PNJ WHERE famille='".str_replace("'","''",$v->Nom)."' AND nom='".str_replace("'","''",$v->Prenom)."'";
        $resultat=$mysqli->query($requete_detect);
        $ligne=$resultat->fetch_assoc();
        //echo $ligne['famille'].' '.$ligne['nom']."<br>";
        $scn1=0;
        $scn2=0;
        $scn3=0;
        $scn4=0;
        $scn5=0;
        $scn6=0;  
        if($v->scenar1!=""){$scn1=1;}
        if($v->scenar2!=""){$scn2=1;}
        if($v->scenar3!=""){$scn3=1;}
        if($v->scenar4!=""){$scn4=1;}
        if($v->scenar5!=""){$scn5=1;}
        if($v->scenar6!=""){$scn6=1;}
        echo $v->Nom.' '.$v->Prenom.' '.$v->scenar1." - ".$v->scenar2." - ".$v->scenar3." - ".$v->scenar4." - ".$v->scenar5." - ".$v->scenar6."<br>";
        
        $notes=str_replace("'","''",$v->Notes);
        $notes=nl2br($notes);
        
        if($ligne['id']==""){
           
            if($v->Nom!="" and $v->Prenom!=""){
               
                
               ;
                
                $requete="INSERT INTO `PNJ` (`id`, `clan`, `famille`, `nom`, `sexe`, `age`, `vivant`, `occupation`, `caractere`, `note`,`scn1`,`scn2`,`scn3`,`scn4`,`scn5`,`scn6`) VALUES (NULL, '$v->Clan', '$v->Nom', '$v->Prenom', '$v->Sexe', '$v->Age', '$v->Vivant', '".str_replace("'","''",$v->Occupation)."', '".str_replace("'","''",$v->Caractere)."', '".$notes."','$scn1','$scn2','$scn3','$scn4','$scn5','$scn6' )";
                //echo $requete."<br>";
                $mysqli->query($requete);
                $add+=1;
                
            }
        }else{
            $requete="UPDATE `PNJ` SET `clan`='$v->Clan',`sexe`='$v->Sexe', `age`='$v->Age', `vivant`='$v->Vivant', `occupation`='".str_replace("'","''",$v->Occupation)."', `caractere`='".str_replace("'","''",$v->Caractere)."', `note`='".$notes."',`scn1`='$scn1',`scn2`='$scn2',`scn3`='$scn3',`scn4`='$scn4',`scn5`='$scn5',`scn6`='$scn6'  WHERE id='".$ligne['id']."'";
            //echo $requete."<br>";
            $mysqli->query($requete);
            
            $update+=1;
        }
        
                
        
    }
    echo "éléments ajoutés à la base de données<br>Mises à jour : $update <br> Ajout : $add";
    
    
    
    ?>
    
</body>
</html>