<?php
	//Start session

	//Include database connection details
include('connection.php');

$id = $_REQUEST['value'];

$qry = "DELETE FROM usuarios WHERE ID = '$id' ";
$sentencia = mysql_query($qry,$con);
if($sentencia){	
	echo '<script language="javascript">';
	echo 'if(alert("Exitooo")){location.href="admin_usuarios.php";}else{location.href="admin_usuarios.php"};';
	echo '</script>';
	//header('Location: admin_usuarios.php');

} else{
	echo '<script language="javascript">';
	echo 'if(alert("ERROR")){location.href="admin_usuarios.php";}else{location.href="admin_usuarios.php";';
	echo '</script>';
}	
?>