$(function(){

    $('#verCuenta').on('click',buscarC);
    //$('#realizarTrans').on('click',guardado);
   // $('#GPagoServ').on('click',guardarPagoServicio);
   
   });
   
   function buscarC(){
   var cliente=$('#ciform').val();
   console.log(cliente);

      $.get('/admi/cliente/VerCuentaC/'+cliente, function(dato) {
         
      });  
   }
   
