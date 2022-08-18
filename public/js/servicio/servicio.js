var val=false;
$(function(){
   // $('#idprod').on('change', selectprod);
 
 $('#buscaruser').on('click',buscarciC);
 $('#buscarusercred').on('click',buscarciCredito);
 $('#codCred').on('change',llenarTable);
 
 //$('.td').on('click',busc);
 $("tbody").on("click",".td", busc);
 $('#BGarante').on('click',viewFuenteLaboral);
 $('#BFuenteLaboral').on('click',viewAporteAFP);
 $('#BAFP').on('click',viewCredito);
 /*$("tbody").on("click",".btn-danger", elminarfila);
 $("body").on("keyup","input", filatotal);
 $("body").on("change","input", filatotal);
 //$('#Bguardado').on('click', Datosguardados);
 $('#Bguardar').on('click', guardarDatos);
 $('#Benviar').on('click', enviarDatos);
 
 newFunction();*/
 
});
function busc(){  
    var k=$(this).val();
    var cuenta=$('#tdnumero'+k).val();
    var closable = alertify.alert().setting('closable');
    //grab the dialog instance using its parameter-less constructor then set multiple settings at once.
    alertify.alert()
      .setting({
        'label':'Eliminar',
        'title':'Advertencia',
        'message': 'Mensaje : ' + (closable ? ' ' : ' not ') + 'Está Seguro que quiere eliminar la Cuenta?.' ,
        'onok': function(){ alertify.success('Cuenta Eliminada');
         eliminar(cuenta);}
      }).show();
   
}
function buscarciC(){
    var cliente=$('#ci_cliente').val();
    $('#ciform').val(cliente);
        $.get('/api/cliente/'+cliente, function(dato) {
            if(dato[0]){
              //  alert("persona registrada");
           alertify.alert("Succes","Usuario Encontrado: "+dato[0].nombre+" "+dato[0].paterno+" "+dato[0].materno).set('label', 'Cerrar');
            
           cargarCuentasTablas(dato[0].ci);
        
      //     $('#ciform').val(cliente);
         }else{
             //   alert("persona no registrada");
              alertify.alert("Error","Usuario no Encontrado").set('label', 'Cerrar');
           
            }   
        });  
    }
    function buscarciCredito(){
        var cliente=$('#ci_cliente').val();
        $('#ciform').val(cliente);
            $.get('/api/cliente/'+cliente, function(dato) {
                if(dato[0]){
                  //  alert("persona registrada");
               alertify.alert("Succes","Usuario Encontrado: "+dato[0].nombre+" "+dato[0].paterno+" "+dato[0].materno).set('label', 'Cerrar');
                 $('#ciform').val(cliente);
             }else{
                 //   alert("persona no registrada");
                  alertify.alert("Error","Usuario no Encontrado").set('label', 'Cerrar');
               
                }   
            });  
        }
    
function   cargarCuentasTablas(ci){
    var html_select ='';
    var j=0;
   
        $.get('/api/admi/GetDPF/'+ci, function(dato) {
            if(dato[0]){
         j=0;
          
           console.log(dato);
        for(var i=0 ;i< dato.length ;i++){
       
            j=j+1;
            html_select +='<tr id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
        html_select +='<td >'+dato[i].nro+'<input type="hidden" id="tdnumero'+j+'" name="tdnombre'+j+'" value="'+dato[i].nro+'" /> </td>';
        html_select +='<td>' +dato[i].fecha_ini+'</td>';
        html_select +='<td >'+dato[i].fecha_fin+'</td>';
        html_select +='<td >'+dato[i].monto+'</td>';
        html_select +='<td >'+dato[i].tiempo+'</td>';
        html_select +='<td >'+dato[i].interes+'</td>';
        var montT = dato[i].monto * dato[i].interes;
        montT=montT/100;
        montT=montT + dato[i].monto;
        html_select +='<td >'+montT+'</td>';
        $('#contenidoC').html(html_select);
           }                        
           //$('#ciform').val(cliente);
         }else{
             //   alert("persona no registrada");
              alertify.alert("Error","Usuario no Tiene Cuentas DPF").set('label', 'Cerrar');
           
            }   
        });  
    }
    
function viewAporteAFP(){
    let element = document.getElementById('FormFuenteLaboral');
    element.style.setProperty('display', 'none');
    let element2 = document.getElementById('FormAFP');
    element2.style.setProperty('display', '');
}

function viewFuenteLaboral(){
    let element2 = document.getElementById('FormGarante');
    element2.style.setProperty('display', 'none');
    let element = document.getElementById('FormFuenteLaboral');
    element.style.setProperty('display', '');   
}

function viewCredito(){
    let element = document.getElementById('FormAFP');
    element.style.setProperty('display', 'none');
    let element2 = document.getElementById('FormCredito');
    element2.style.setProperty('display', '');   
}

function  llenarTable(){
    var codCredito=$('#codCred').val();
    var html_select ='';
    var j=0;
   
        $.get('/api/admi/GetCredito/'+codCredito, function(dato) {
         j=0;
        for(var i=0 ;i< dato.length ;i++){
            j=j+1;
            html_select +='<tr style="background:#D6EAF8;" id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
        html_select +='<td >'+dato[i].codigo+'<input type="hidden" id="tdncredito'+j+'" name="tdcredito'+j+'" value="'+dato[i].codigo+'" /> </td>';
        html_select +='<td>' +dato[i].interes+'</td>';
        html_select +='<td >'+dato[i].monto+'</td>';
        html_select +='<td >'+dato[i].plazo+'</td>';
        html_select +='<td >'+dato[i].estado+'</td>';
        html_select +='<td >'+dato[i].ci_cliente+'</td></tr><tr></tr>';
        $('#contenidoC').html(html_select);
         formtablagarante(dato[i].ci_garant); 
         formtablaLaboral(dato[i].f_nit);   
         formtablaAFP(dato[i].ap_code);                      
        }
        });  
    }
    function  formtablagarante(cig){        
        var html_select ='';
        var j=0;
       
            $.get('/api/admi/GetGarante/'+cig, function(dato) {
             j=0;
            for(var i=0 ;i< dato.length ;i++){
                j=j+1;
                html_select +='<tr style="background:#D6EAF8;" id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
            html_select +='<td >'+dato[i].ci_garante+'<input type="hidden" id="tdgarante'+j+'" name="tdgarante'+j+'" value="'+dato[i].ci_garante+'" /> </td>';
            html_select +='<td>' +dato[i].nombre_garante+'</td>';
            html_select +='<td >'+dato[i].apellido_garante+'</td>';
            html_select +='<td >'+dato[i].descripcion_inmueble+'</td>';
            html_select +='<td >'+dato[i].valor_estimado+'</td></tr><tr></tr>';
            $('#contenidoG').html(html_select);                   
             }
            });  
        }
        function  formtablaLaboral(fnit){        
            var html_select ='';
            var j=0;
                $.get('/api/admi/GetFuenteLaboral/'+fnit, function(dato) {
                 j=0;
                for(var i=0 ;i< dato.length ;i++){
               
                    j=j+1;
                    html_select +='<tr style="background:#D6EAF8;" id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
                html_select +='<td >'+dato[i].nit+'<input type="hidden" id="tdgarante'+j+'" name="tdgarante'+j+'" value="'+dato[i].id+'" /> </td>';
                html_select +='<td>' +dato[i].razon_social+'</td>';
                html_select +='<td >'+dato[i].antiguedad+'</td>';
                html_select +='<td >'+dato[i].ganancia_neta+'</td></tr><tr></tr>';
                $('#contenidoL').html(html_select);                   
                 }
                });  
            }
            function  formtablaAFP(afp){        
                var html_select ='';
                var j=0;
                    $.get('/api/admi/GetAFP/'+afp, function(dato) {
                     j=0;
                    for(var i=0 ;i< dato.length ;i++){
                   
                        j=j+1;
                        html_select +='<tr style="background:#D6EAF8;" id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
                    html_select +='<td >'+dato[i].codigo_asegurado+'<input type="hidden" id="tdgarante'+j+'" name="tdgarante'+j+'" value="'+dato[i].codigo_asegurado+'" /> </td>';
                    html_select +='<td>' +dato[i].tiempo_aportado+'</td>';
                    html_select +='<td >'+dato[i].monto_aportado+'</td></tr><tr></tr>';
                    $('#contenidoAFP').html(html_select);                 
                      }
                    });  
                }







function msg(){
    alert("a");
}
function Solo_Numerico(variable){
    numer=parseInt(variable);
    if (isNaN(numer)) {
        return "";
    }
    return numer;
}
function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);
}
function msg_no_haySaldo(){
    alert("No tiene suficiente Saldo en su cuenta para realizar esta Transaccion");
}
function msg_datos_malos(){
    alert("No introdujo datos Validos");
}
function msg_no_existeCuenta(){
  alertify.alert("ERROR","Ingrese un numero de Cuenta Valido").set('label', 'Cerrar');
}
function mensaje(){
        alertify.alert("Titulo","Se realizo la Transaccion").set('label', 'Aceptar');
}
