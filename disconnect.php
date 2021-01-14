<?php 
//Desconexion del usuario
//Inicio de sesión
session_start();
//Destruimos todo en esta sesión
if($_SESSION['user']){	
	session_destroy();
	header("location:login.php");
}
else{
	header("location:login.php");
}
?>