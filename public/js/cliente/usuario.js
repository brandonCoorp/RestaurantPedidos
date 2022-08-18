$(function(){

    $('#buscarC').on('click',buscar);
    //$('#realizarTrans').on('click',guardado);
   // $('#GPagoServ').on('click',guardarPagoServicio);
   
   });
   
   function buscar(){
   var cliente=$('#numerocuenta').val();
console.log(cliente);
   $('#ciform').val(cliente);
       $.get('/api/cliente/user/'+cliente, function(dato) {
           if(dato[0]){
             //  alert("persona registrada");
           alertify.alert("Success","Cuenta de usuario encontrada").set('label', 'Cerrar');
           $('#passanterior').val(dato[0].pass);
           $('#ciCliente').val(dato[0].codigo); 
        }else{
            //   alert("persona no registrada");
             alertify.alert("Error","Uusario no encontrado").set('label', 'Cerrar');
          
           }   
       });  
   }
    function ValNumero(Control){
      Control.value=Solo_Numerico(Control.value);
  }
  
  function Solo_Numerico(variable){
    numer=parseInt(variable);
    if (isNaN(numer)) {
        return "";
    }
    return numer;
}

  