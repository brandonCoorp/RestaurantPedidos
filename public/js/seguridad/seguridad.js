$(function(){
    // $('#idprod').on('change', selectprod);
  $('#creaGrup').on('click',addview);
  $('#admiGrup').on('click',admiview);
  $('#selectGrupo').on('change',datosGrupo);
  
  $('#selectRol').on('change',datosRol);
  
 });
  function addview(){
    let element2 = document.getElementById('fadmigrup');
    element2.style.setProperty('display', 'none');
    let element = document.getElementById('faddgrup');
    element.style.setProperty('display', '');   
  }
  function admiview(){
    let element2 = document.getElementById('fadmigrup');
    element2.style.setProperty('display', '');
    let element = document.getElementById('faddgrup');
    element.style.setProperty('display', 'none');   
  }
  
  function datosGrupo(){
    id_grupo=$(this).val();
    $.get('/api/grupo/get/'+id_grupo, function(dato) {
        //var cliente=$('#ciform').val();
        
       $('#nombreE').val(dato[0].nombre);
        if(dato[0].id_priv==1){
       document.getElementById("privilegioE").selectedIndex = 0;
        }else  if(dato[0].id_priv==2){
            document.getElementById("privilegioE").selectedIndex = 1;
        }else{
            document.getElementById("privilegioE").selectedIndex = 2;
        }
    });  


    
  }
  
  function datosRol(){
    id_rol=$(this).val();
    $.get('/api/rol/get/'+id_rol, function(dato) {
        
       $('#nombreR').val(dato[0].nombre);
       $('#descripB').val(dato[0].descripcion);
       sel=document.getElementById('GrupoE');
        opts=sel.options;
     
        for (x=0;x<opts.length;x++){     
            if (parseInt(opts[x].value) === dato[0].id_grupo){        
               sel.selectedIndex=x;
            }
        }
   
    });  


    
  }