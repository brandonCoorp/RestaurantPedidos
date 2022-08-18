<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
</head>
<body class="cover"  
style="background-image: url(assets/img/LoginEvento.jpg); background-size: 100% 100%;">

    
    <form action="{{route('login')}}" method="POST" autocomplete="off" class="full-box logInForm">
        <p class="text-center text-muted text-uppercase" ><svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg></P>
        
         <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="email">Email</label>
		  <input class="form-control" name="email" id="email" type="text">
		  <p class="help-block">Escribe tú Correo Electronico</p>

          
        </div>
		<div class="form-group label-floating">
		  <label class="control-label" for="password">Contraseña</label>
		  <input class="form-control" name="password" id="password" type="password">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		{!! $errors->first('email','<span style="color:white">Revisa bien tu correo o contraseña</span>')!!}
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>
		@csrf
	</form>
	<!--====== Scripts -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/material.min.js"></script>
	<script src="js/ripples.min.js"></script>
	<script src="js/sweetalert2.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>