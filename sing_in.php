<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
  <link rel="stylesheet" type="text/css" href="global/css/general.css">
	<title>Registro de Usuarios</title>
</head>
<body>
  <!--Formulario de Registro-->
  <form class="formulario" method="post" action="">
    <h1>Registrate</h1>
    <div class="contenedor">
      <div class="input-contenedor">
        <i class="fas fa-user icon"></i>
        <input type="text" name="realname" placeholder="Nombre Completo" required>
      </div>
      <div class="input-contenedor">
        <i class="fas fa-envelope icon"></i>
        <input type="text" name="nick" placeholder="Correo Electronico" required>
      </div>
      <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
        <input type="password" name="pass" placeholder="Contraseña" required>
      </div>
      <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
        <input type="password" name="rpass" placeholder="Repita contraseña" required>
      </div>
      <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
      <input type="submit" name="submit" class="button" value="Registrarse">
      <p>¿Ya tienes una cuenta?<a class="link" href="login.php">Iniciar Sesión</a></p>
    </div>
  </form>
  <?php
    if(isset($_POST['submit'])){
      require("register.php");
    }
  ?>
</body>
</html>