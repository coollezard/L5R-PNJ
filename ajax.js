$(function() {
    jQuery.event.props.push('dataTransfer');
    var cpt_zindex=0;
    var pos=-70;
    var nbouvert=0;
    
    
    $(document).on('click', '.minicarte', function() {popitup($(this).attr('id'))});
    $(document).on('click', '.relation', function() {popitup($(this).attr('id'))});
    $(document).on('click', '.close', function() {closeme($(this).attr('id'))});
    $(document).on('click', '#closerelation', function() {closerela()});
    $(document).on('mouseover', '.bigbanner', function() {$(this).closest('.bigcarte').draggable();});
    $(document).on('mousedown', '.bigcarte', function() {tothetop($(this).attr('id'))});
    $(document).on('click', '#editbtn', function() {openrelation($(this.parentElement).attr('id'))});
    $(document).on('click', '.ui-menu-item',  function(){test()});
    
    
    
                   
    function editfiltre(){
        var clan=$('#clan').val();
        var famille=$('#famille').val();
        var sexe=$('#sexe').val();
        var scenario=$('#scenario').val();
        var etat=$('#etat').val();
        $.post('ajax/listevignettes.php',{clan:clan,famille:famille,sexe:sexe,scenario:scenario,etat:etat}, function(data){$("#tableau").html(data);});  

    }
    function popitup(e){
        var idcliked=e;
        var altclique=$('#'+e).attr('alt');
        if($('#big'+altclique).length){//si cette id existe déjà (pop up deja ouverte) on en ouvre pas une autre mais on la passe en premier plan
            var bigcible="big"+altclique;
            tothetop(bigcible);
        }else{//mais si elle n'existe pas on l'ouvre
            $.post('ajax/unevignette.php',{id:idcliked, z:cpt_zindex, pos:pos}, function(data){$("#socle").append(data);});
            cpt_zindex++; 
            pos+=30;
            nbouvert++;
        }
    }
    
    function closeme(e){
        var cible="big"+e;
        $( "#"+cible ).remove();
        nbouvert--;
        if(nbouvert<=0){pos=-70;}
    }
    
    function closerela(){
        
        $("#allscreen").remove();
        
    }
    
    function tothetop(e){
        var cible="#"+e;
        var currentz=$(cible).css('z-index');
        currentz++;
        
        if(cpt_zindex>currentz){
            $("#"+e).css('z-index',cpt_zindex);
            cpt_zindex++;
        }
        
    }
    
   function openrelation(e){
       $.post('ajax/relation.php',{id:41}, function(data){$("#main").append(data);});
   }

    
});

