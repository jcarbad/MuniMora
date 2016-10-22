<?php
	//Start session

	//Include database connection details
include('connection.php');

$id = $_REQUEST['id1'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$username = $_POST['usuario'];
$contrasena = $_POST['contrasenna'];
$type = $_POST['tipo'] ;

$qry = "UPDATE usuarios SET NAME ='$nombre', LASTNAME ='$apellido', ID ='$username',PASSWORD ='$contrasena', TIPO = '$type' WHERE ID = '$id' ";
$sentencia = mysql_query($qry,$con);
if($sentencia){	
	echo '<script language="javascript">';
	echo 'alert("Exitooo")';
	echo '</script>';
	header('Location: admin_usuarios.php');

} else{
	echo '<script language="javascript">';
	echo 'alert("ERROR")';
	echo '</script>';
}	
?>