<?php
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
	$pdo= new PDO($servidor, USUARIO, PASSWORD,
		array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
	);
	//echo "<script>alert('Conectado a la BD.')</script>";
}catch(PDOException $e){
	//echo "<script>alert('Error al conectar a la BD.')</script>";
}
?>
<?php
//Conexion a la bd
$mysqli = new MySQLi("localhost", "root","", "ecommerce");
//Verifica si se conecto a la bd
if ($mysqli -> connect_errno) {
	die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}else{
	//echo "Conexión ok!";
}
?>