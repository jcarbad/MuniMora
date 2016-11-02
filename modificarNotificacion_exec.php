<?php
	//Start session

	//Include database connection details
include('connection.php');

$id = $_REQUEST['id1'];
$expediente = $_POST['exp'];
$propietario = $_POST['propietario'];
$receptor = $_POST['receptor'];
$creacion = $_POST['creacion'];
$caducacion = $_POST['caducacion'];
$descripcion = $_POST['descripcion'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$tipo = $_POST['tipo'];
$observaciones = $_POST['observaciones'] ;

$qry = "UPDATE notificaciones SET expediente ='$expediente', propietario ='$propietario', receptor ='$receptor',
fechaCre ='$creacion',fechaCad ='$caducacion', descripcion ='$descripcion', direccion ='$direccion',
estado ='$estado', tipo = '$tipo', observaciones ='$observaciones' WHERE expediente = '$id' ";
$sentencia = mysql_query($qry,$con);
if($sentencia){
	echo '<script language="javascript">';
	echo 'alert("Exitooo")';
	echo '</script>';
	header('Location: index_notificaciones.php');

} else{
	echo $expediente;
  echo $propietario;
  echo $receptor;
  echo $creacion;
  echo $caducacion;
  echo $descripcion;

}
?>
