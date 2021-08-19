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




<?php
include("../connexion.php");
$rqtrela="SELECT id_relation, relation, nom, famille, clan  FROM relations LEFT JOIN PNJ ON PNJ.id=id_relation WHERE id_pnj='$cible';";
$rela=$mysqli->query($rqtrela);
$accent=array('á','à','â','ä','ã','å','ç','é','è','ê','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
$pasaccent=array('a','a','a','a','a','a','c','e','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');

$pnj="";
$rqtliste="SELECT id, famille,  nom  FROM PNJ";
$liste=$mysqli->query($rqtliste);
while($laliste=$liste->fetch_assoc()){
    $pnj.='{ value: "'.$laliste['famille'].' '.$laliste['nom'].'", data: "'.$laliste[''].'" }, ';    
}
$pnj=substr($pnj, 0, -2);

?>



<script type="application/javascript">
var countries = [
   { value: 'Andorra', data: 'AD' },
   { value: 'Zimbabwe', data: 'ZZ' }
];

$('#autocomplete').autocomplete({
    lookup: countries,
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
});
</script>
<input type="text" name="country" id="autocomplete"/>



</body>