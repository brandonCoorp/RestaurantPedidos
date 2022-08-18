$(function(){
    // $('#idprod').on('change', selectprod);
  $('#transaccion').on('click',saludo);
  /*$("tbody").on("click",".btn-danger", elminarfila);
  $("body").on("keyup","input", filatotal);
  $("body").on("change","input", filatotal);
  //$('#Bguardado').on('click', Datosguardados);
  $('#Bguardar').on('click', guardarDatos);
  $('#Benviar').on('click', enviarDatos);
  
  newFunction();*/
  
 });
  function saludo(){
    alert("Pedido Guardado Exitosamente. ");
    $('#divcontent').load('transferencia.php');
  }
 