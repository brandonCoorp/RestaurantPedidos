$(function(){
  $('#buscarCi').on('click',buscar);
  $('#buscarCliente').on('click',buscarCliente);
  $('#buscaruser').on('click',buscarci);
  
  //$('#realizarTrans').on('click',guardado);
 // $('#GPagoServ').on('click',guardarPagoServicio);
 
 });
 
 function buscar(){
 var cliente=$('#ci_cliente').val();
 $('#ciform').val(cliente);
     $.get('/api/cliente/'+cliente, function(dato) {
         if(dato[0]){
           //  alert("persona registrada");

         alertify.alert("ERROR","Persona Ya registrada").set('label', 'Cerrar');
         }else{
          //   alert("persona no registrada");
           alertify.alert("Sucess","Verificado").set('label', 'Cerrar');
        
         }   
     });  
 }
 function buscarci(){
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



 function buscarCliente(){
    var cliente=$('#ci_clienteP').val();
    $('#ciform').val(cliente);
        $.get('/api/cliente/'+cliente, function(dato) {
            if(dato[0]){
              $('#namecli').val(dato[0].nombre);
              $('#paternocli').val(dato[0].paterno);
               $('#maternocli').val(dato[0].materno);
               
              $('#edad').val(dato[0].edad);
              $('#estado').val(dato[0].estado_civil);
               $('#dir').val(dato[0].direccion);
               $('#ciform').val(dato[0].ci);
               
               $('#cel').val(dato[0].telefono);
             //  $('#cuentaD').val(cuentaD);
          
            alertify.alert("Succes","Persona Encontrada").set('label', 'Cerrar');
            }else{
             //   alert("persona no registrada");
              alertify.alert("Error","No encontrado").set('label', 'Cerrar');
           
            }   
        });  
    }


 
 function enviar(pagina){
    document.formulario1.action = pagina;
    document.datos_p_cliente.submit();
}



////////alertyfy/////////////////
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
      // alert("Ingrese un numero de cuenta Valido");
    alertify.alert("ERROR","Ingrese un numero de Cuenta Valido").set('label', 'Cerrar');
  }
  function msg_no_exist_Cliente(){
      // alert("Ingrese un numero de cuenta Valido");
    alertify.alert("ERROR","Este Usuario no esta Registrado").set('label', 'Cerrar');
  }

  function mensaje(){
      /*if ('true'==verif_cuenta()) {
          document.datos.nameuser.value= "PPPPPP";
          alertify.alert("Titulo","Esto es un mensaje2").set('label', 'Aceptar');

      }else{
          alertify.alert("Titulo","No se pudo").set('label', 'Aceptar');
      }*/
      
          alertify.alert("Titulo","Se realizo la Transaccion").set('label', 'Aceptar');
}
