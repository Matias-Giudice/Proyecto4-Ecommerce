<?php
//Creamos variables y en ellas guardamos variables del archivo "sing_in"
$realname=$_POST['realname'];
$mail=$_POST['nick'];
$pass= $_POST['pass'];
$rpass=$_POST['rpass'];

//Conexion a la bd
require("global/conexion.php");
/*Cosulta a la bd y verifica el registro del usuario, mediante la comparacion de la contraseña y la contraseña repetida: 
	Si se cumple verifica que si ese mail ya esta en uso o no, si no lo esta le avisa que se registro correctamente y lo lleva al login.
	Si no se cumple la comparacion de las contraseñas, le avisa que son incorrectas.
*/
$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
$check_mail=mysqli_num_rows($checkemail);
if($pass==$rpass){
	if($check_mail>0){
		echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos.");</script> ';
	}else{
		mysqli_query($mysqli,"INSERT INTO login VALUES('','$realname','$pass','$mail','','2')");
		echo ' <script language="javascript">alert("Usuario registrado con éxito.");</script> ';
		echo "<script>location.href='login.php'</script>";
	}
}else{
	echo ' <script language="javascript">alert("Las contraseñas son incorrectas.");</script> ';
}	
?>