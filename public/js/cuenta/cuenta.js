var val=false;
$(function(){

 $('#buscarC').on('click',buscar);
 $('#realizarTrans').on('click',guardado);
 $('#GPagoServ').on('click',guardarPagoServicio);
 $('#numerocuenta').on("keyup",buscarC);
 $('#buscaruser').on('click',buscarciC);
 $("tbody").on("click",".td", busc);
 
 
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

function eliminar(cuenta){
  //console.log(cuenta);
  //  $('#ciform').val(cliente);
        $.get('/api/cliente/EliminarCuenta/'+cuenta, function(dato) {
            var cliente=$('#ciform').val();
            console.log(dato);
            console.log(cliente);
            
           cargarCuentasTablas(cliente);
    
        });  
}
function buscar(){
var cuentaD=$('#numerocuenta').val();
    $.get('/api/cuenta/'+cuentaD+'', function(dato) {
        if(!dato[0]){
        alertify.alert("ERROR","Ingrese un numero de Cuenta Valido").set('label', 'Cerrar');
        $('#nameuser').val("");
        $('#paternouser').val("");
         $('#maternouser').val("");
        }else{
           alertify.alert("ERROR","numero de Cuenta Valido"+dato[0].nombre).set('label', 'Cerrar');
            $('#nameuser').val(dato[0].nombre);
           $('#paternouser').val(dato[0].paterno);
            $('#maternouser').val(dato[0].materno);
            $('#cuentaD').val(cuentaD);
        }   
    });  
}

function buscarciC(){
    var cliente=$('#ci_cliente').val();
    $('#ciform').val(cliente);
        $.get('/api/cliente/'+cliente, function(dato) {
            if(dato[0]){
              //  alert("persona registrada");
         //  alertify.alert("Succes","Usuario Encontrado: "+dato[0].nombre+" "+dato[0].paterno+" "+dato[0].materno).set('label', 'Cerrar');
            
           cargarCuentasTablas(dato[0].ci);
        
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
        $.get('/api/admi/cuentas/'+ci, function(dato) {
            if(dato[0]){
              //  alert("persona registrada");
         //  alertify.alert("Succes","Cuenta Encontrado: "+dato.length).set('label', 'Cerrar');
           j=0;
           var moneda="bol";
        for(var i=0 ;i< dato.length ;i++){
         if(dato[i].activo=="si"){
            j=j+1;
            if(dato[i].id_moneda==2){ moneda="Bolivianos"}else{moneda="Dolares"}
            html_select +='<tr id="tr'+j+'" value="'+j+'" class="seleccion"><td>'+j+'</td>';
        html_select +='<td >'+dato[i].numero+'<input type="hidden" id="tdnumero'+j+'" name="tdnombre'+j+'" value="'+dato[i].numero+'" /> </td>';
        html_select +='<td>' +moneda+'</td>';
        html_select +='<td id="tdprecio'+j+'">'+dato[i].saldo+'</td>';
        html_select +='<td id="tdnro'+j+'">'+dato[i].id_tipocuenta+'</td>';
        html_select +='<td><button type="button" value="'+j+'"  class="btn btn-danger btn-raised btn-xs td"><i class="zmdi zmdi-delete"></i></button></td></tr>';
        
        $('#contenidoC').html(html_select);
         }
     //   console.log(j);
        }                        
                                        
                                     
        
           //$('#ciform').val(cliente);
         }
        });  
    }
    

function buscarC(){
    var cuentaD=$('#numerocuenta').val();
    //console.log("ghola");
     if(cuentaD>100000){
        $.get('/api/cuenta/'+cuentaD+'', function(dato) {
            if(!dato[0]){
           // alertify.alert("ERROR","Ingrese un numero de Cuenta Valido").set('label', 'Cerrar');
            let element = document.getElementById('alert');
            element.style.setProperty('display', 'none');
            let element2 = document.getElementById('success');
            element2.style.setProperty('display', '');
           
          }else{
            //   alertify.alert("ERROR","numero de Cuenta Valido").set('label', 'Cerrar');
            let element = document.getElementById('alert');
            element.style.setProperty('display', '');
            element.style.setProperty('color', 'red');
            
            let element2 = document.getElementById('success');
            element2.style.setProperty('display', 'none');
            
          //  element.style.setProperty('font-size', '24px');    
        }   
        });  
    }else{
        let element = document.getElementById('alert');
        element.style.setProperty('color', 'orange');
        element.style.setProperty('display', '');
        let element2 = document.getElementById('success');
        element2.style.setProperty('display', 'none');
       
    }
    }

function saldoCuenta(cuenta,monto){
    var montoT =monto ;
    //var val= false ;
   // console.log(cuenta);
   // console.log(monto);
    $.get('/api/cuentaS/'+cuenta+'', function(dato) {
        montoT =dato[0].saldo -monto;
        console.log(dato[0].saldo);
        if (montoT>-1){
            val = true;
        } else{ val = false;}
        console.log(montoT);
    });
    console.log(val);
    return val;
}

function guardado(){
  
    var cuenta =$('#cuentaO').val() ;
        $.get('/api/cuentaS/'+cuenta+'', function(dato) {
            var monto =$('#montotran').val() ;
         var   montoT =dato[0].saldo -monto;
          //  console.log(dato[0].saldo);
            if (montoT>-1){
               
                $.post("/usuario",$("#datosdestinatario").serialize(),function(res){
                    alert("Transferencia exitosa");
                   window.history.back();
                   });
                   alert("Transferencia exitosa");
                   window.history.back();
            } else{ 
                msg_no_haySaldo();
                window.history.back();
               }
        });
 }
  function guardarPagoServicio(){
         var cuenta =$('#cuentaOs').val() ;
      $.get('/api/cuentaS/'+cuenta+'', function(dato) {
        var monto =$('#montoser').val() ;
     var   montoT =dato[0].saldo -monto;
      //  console.log(dato[0].saldo);
        if (montoT>-1){   
            $.post("/servicio",$("#pagoservicio").serialize(),function(res){
                alert("Transferencia exitosa");
               window.history.back();
               });
               alert("Pago de Servicios Exitoso");
               window.history.back();
        } else{ 
            msg_no_haySaldo();
            window.history.back();
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
