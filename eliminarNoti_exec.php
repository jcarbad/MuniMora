<?php
	//Start session

	//Include database connection details
include('connection.php');

$id = $_REQUEST['value'];

$qry = "DELETE FROM notificaciones WHERE expediente = '$id' ";
$sentencia = mysql_query($qry,$con);
if($sentencia){
	echo '<script language="javascript">';
	echo 'alert("Exitooo")';
	echo '</script>';
	header('Location: index_notificaciones.php');

} else{
	echo '<script language="javascript">';
	echo 'alert("ERROR")';
	echo '</script>';
}
?>
