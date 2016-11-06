<?php
	//Start session

	//Include database connection details
include('connection.php');

$id = $_REQUEST['value'];

$qry = "DELETE FROM usuarios WHERE ID = '$id' ";
$sentencia = mysql_query($qry,$con);
if($sentencia){	
	echo '<script language="javascript">';
	echo 'if(alert("BORRADO CON EXITO.\n Desea Continuar?")){location.href="admin_usuarios.php";}else{location.href="admin_usuarios.php";}';
	echo '</script>';
	//header('Location: admin_usuarios.php');
} else{
	echo "mensaje de prueva";
	echo '<script language="javascript">';
	echo 'if(alert("ERROR.\n Desea Continuar?")){location.href="admin_usuarios.php";}else{location.href="admin_usuarios.php";}';
	echo '</script>';
}	
?>