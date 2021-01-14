<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" type="text/css" href="global/css/general.css">
	<title>Registro de Usuarios</title>
</head>
<body>
    <!--Formulario de Inicio de sesión-->
	<form class="formulario" action="validate.php" method="post">
    	<h1>Inicio de sesión</h1>
     	<div class="contenedor">
     		<div class="input-contenedor">
         		<i class="fas fa-envelope icon"></i>
         		<input type="text" name="mail" placeholder="Correo Electronico" required>
         	</div>
         	<div class="input-contenedor">
        		<i class="fas fa-key icon"></i>
         		<input type="password" name="pass" placeholder="Contraseña" required>
         	</div>
         	<input type="submit" class="button" value="Iniciar sesión">
         	<p>¿Necesitas una cuenta? <a class="link" href="sing_in.php">Registrate </a></p>
     	</div>
    </form>
</body>
</html>