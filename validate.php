<?php
//Inicio de sesión
session_start();
//Conexion a la bd
require("global/conexion.php");
//Creamos variables y en ellas guardamos variables del archivo "login"
$username=$_POST['mail'];
$pass=$_POST['pass'];
/*Cosulta a la bd y verifica el inicio de sesión del usuario, mediante se cunpla la consulta a la bd para ver si exite el usuario:
   Si existe: Se compara la contraseña y la contraseña guardada en la bd: 
	Si se cumple inicia sesión, mediante los datos guardados en la bd y lo lleva al index(página principal).
	Si no se cumple la comparacion de las contraseñas, le avisa que es incorrecta y redirige de vuelta al login.
   Si no existe: Le avisa al usuario que no existe esa cuenta y que se registre para poder ingresar y lo redirige al login.
*/
$sql=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$username'");
if($f=mysqli_fetch_assoc($sql)){
	if($pass==$f['password']){
		$_SESSION['id']=$f['id'];
		$_SESSION['user']=$f['user'];
		$_SESSION['rol']=$f['rol'];

		header("Location: index.php");
	}else{
		echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
		echo "<script>location.href='login.php'</script>";
	}
}else{
	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
	echo "<script>location.href='login.php'</script>";	
}
?>