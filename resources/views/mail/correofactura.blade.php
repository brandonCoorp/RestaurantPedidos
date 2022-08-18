<html lang="en">
<head>
  <title>Patio Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/dashboard/bootstrap.min.css')}}">
  <script src="{{asset('css/dashboard/jquery.js')}}"></script>
  <script src="{{asset('css/dashboard/bootstrap.js')}}"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
  <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     
    </div>
    <div class="col-sm-8 text-left"> 
    <h1>Compra Exitosa :)</h1>
    <img src="https://i.postimg.cc/gjW4GvLP/exitosa.png" class="img-thumbnail" alt="Cinque Terre" width="700" height="400"> 

    <h1>Ver Factura Electronica aqui:</h1>
    <a href="{{route('factura',[$usuario,$factura])}}">Ver Factura</a>
      <hr>
    </div>
    <div class="col-sm-2 sidenav">
     
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Muy pronto en PlayStore</p>
</footer>

</body>
</html>