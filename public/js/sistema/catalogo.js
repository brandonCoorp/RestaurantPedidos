$(function(){
   /* $('#idpr').on('change', selectprod);
 
 $("body").on("click",".btn-danger", elminarfila);
 $("body").on("keyup","input", filatotal);
 $("body").on("change","input", filatotal);
 //$('#Bguardado').on('click', Datosguardados);
 */
$('#CantidadImg').on('click', AumentarCantidad);
$('#CantidadImgMenos').on('click', DisminuirCantidad);

$('#CerrarCantidad').on('click', ReiniciarCantidad);
$('#botonAñadir').on('click', obtenerId);
$('#BotonAñadirProducto').on('click', AñadirCarrito);

//$('#Benviar').on('click', enviarDatos);
 
 console.log("ola");
});

function AumentarCantidad() {
   var sumtotal=0;   
  
 sumtotal = 1 + Number($('#Cantidad').val());
 console.log(sumtotal);
 $('#Cantidad').val(sumtotal);
 $('#CantidadInput').val(sumtotal);

}

function DisminuirCantidad() {
    var sumtotal=0;   
   
  sumtotal = Number($('#Cantidad').val()) -1;
  console.log(sumtotal);
  
  if(sumtotal<0){
    sumtotal=0;
  }
  $('#Cantidad').val(sumtotal);
 $('#CantidadInput').val(sumtotal);
   
 }
 
function ReiniciarCantidad() {
    var sumtotal=0;   
  $('#Cantidad').val(sumtotal);
  $('#CantidadInput').val(sumtotal);
 }
 
function obtenerId() {
  //console.log($(this).val());
  $('#idProd').val($(this).val());
 
 }
 function AñadirCarrito() {
    alert('Producto Añadido con exito');
 }