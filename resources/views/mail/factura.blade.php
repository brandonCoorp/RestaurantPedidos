<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard/bootstrap.min.css">
  <script src="css/dashboard/jquery.js"></script>
  <script src="css/dashboard/bootstrap.js"></script>


    <title>Factura</title>
</head>
<body>
<img src="logos2.png" height="100" width="100">
<strong><h2 >Factura Electronica</h2></strong>

<h4>Folio Fiscal :</h4>
<h5>59EFREFERG-GERGE-RGHRT-JHTH-TERER</h5>
<h4>Certificado SIN : </h4>
<h5>20000000000000123545</h5>
<h4>Fecha : <?php echo now(); ?></h4> 


<h3>Receptor : {{$persona->name}}</h3>
<h3>ID del usuario : {{$persona->id}}</h3>
<table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Monto</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($dfacturas as $dfactura)
            <tr>
            @foreach ($productos as $producto)
                <td>{{$producto->Nombre}}</td>
                @endforeach
                 <td>{{$dfactura->Cantidad}}</td>
                 <td>{{$dfactura->Precio}}</td>
                 <td>{{$dfactura->Total}}</td>
             </tr>
            @endforeach
        
        </tbody>
    </table>
    <h3>Costo de envío : 12 bs</h2>
<h2>Subtotal : {{$factura->Total }}</h2>
    <h2>Subtotal + IVA (13 %) : <?php echo round(12+$factura->Total*1.13,2); ?></h2>
</body>
</html>